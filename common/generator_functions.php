<?php
// CHECK IF MAP TILE EXITS OR IS DEFAULT
function isMapThere($x,$y){
  // init & includes
  include "includes/dbConfig.php";
  $out = false;
  // get default query & count
  $defaultQ = mysqli_query($con, "SELECT * FROM map_default WHERE map_X='$x' AND map_Y='$y'");
  $defaultCount = mysqli_num_rows($defaultQ);
  // validate default map
  if ($defaultCount > 0){
    // map is default
    $out = true;
  }
  else{
    // map is not default > perform search for generated
    // get generated map query
    $genQ = mysqli_query($con, "SELECT * FROM map_generated WHERE mapGen_x='$x' AND mapGen_y='$y'");
    $genCount = mysqli_num_rows($genQ);
    // validate generated map and gives boolean return
    if ($genCount > 0){
      $out = true;
    }
    else{
      $out = false;
    }
  }
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------------------------------
// GET MAP TILE IMAGE
function retriveMapTile_img($x,$y){
  // init & includes
  include "includes/dbConfig.php";
  $out = null;
  // check if tile exists
  if (!isMapThere($x,$y)){
    // map is not there > give default
    $out = "default_tile";
  }
  else{
    // map is there > get tile name
    // check if default or generated
    $defQ = mysqli_query($con, "SELECT * FROM map_default WHERE map_X='$x' AND map_Y='$y'");
    $defCount = mysqli_num_rows($defQ);
    if ($defCount > 0){
      // is default
      $mapQ = mysqli_query($con, "SELECT * FROM map_default WHERE map_X='$x' AND map_Y='$y'");
      $mapA = mysqli_fetch_array($mapQ);
      $out = $mapA['map_tile'];
    }
    else{
      // is generated
      $mapQ = mysqli_query($con, "SELECT * FROM map_generated WHERE mapGen_x='$x' AND mapGen_y='$y'");
      $mapA = mysqli_fetch_array($mapQ);
      $out = $mapA['mapGen_tile'];
    }
  }
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------------------------------
// IS MAP A DEFAULT MAP
function isMapDefault($x,$y){
  // init & includes
  include "includes/dbConfig.php";
  $out = null;
  // query default table
  $defQ = mysqli_query($con, "SELECT * FROM map_default WHERE map_X='$x' AND map_Y='$y'");
  $defCount = mysqli_num_rows($defQ);
  if ($defCount > 0){
    // map is default
    $out = true;
    return $out;
  }
  else{
    // map is not default
    $out = false;
    return $out;
  }
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------------------------------
// IS THERE A STAR HERE?
function isStarThere($x,$y){
  // init & includes
  include "includes/dbConfig.php";
  $out = null;
  // check if map exists
  if(!isMapThere($x,$y)){
    // map is not there > end false
    $out = false;
    return $out;
  }
  else{
    // map is there > check if default
    if (isMapDefault($x,$y)){
      // map is default > get star ID
      $starQ = mysqli_query($con, "SELECT * FROM map_default WHERE map_X='$x' AND map_Y='$y'");
      $starA = mysqli_fetch_array($starQ);
      $starID = $starA['map_star'];
      // validate ID
      if ($starID < 1){
        // there is no star > end false
        $out = false;
        return $out;
      }
      else{
        // there is star > return star ID
        $out = $starID;
        return $out;
      }
    }
    else{
      // map is NOT default > get Star ID
      $starQ = mysqli_query($con, "SELECT * FROM map_generated WHERE mapGen_x='$x' AND mapGen_y='$y'");
      $starA = mysqli_fetch_array($starQ);
      $starID = $starA['mapGen_star'];
      // validate ID
      if ($starID < 1){
        // there is no star > end false
        $out = false;
        return $out;
      }
      else{
        // there is star > return star ID
        $out = $starID;
        return $out;
      }
    }
  }
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------------------------------
// GENERATE MAP
function generateMap($x,$y){
  // includes and init
  include "includes/dbConfig.php";
  // verify if map is there
  if (isMapThere($x,$y)){
    return false;
  }
  // map is not there > generate
  // get map data > leave star ID & map name to the conclusion of this function to avoid order errors.
  $tileIMG = genMapTileIMG();
  $mapNow = time();
  $userID = getUserID();
  // insert MAP
  $insertMapQ = mysqli_query($con, "INSERT INTO map_generated (mapGen_x,mapGen_y,mapGen_tile,mapGen_createdAt,mapGen_discoveredBy) VALUES ('$x','$y','$tileIMG','$mapNow','$userID')");
  // execute query
  if (!$insertMapQ){
    print mysqli_error($con);
    return;
  }
  // define MAP ID
  $mapID = mysqli_insert_id($con);
  // verify if star is generated
  if (odds_star()){
    // get star name and ID to update on map
    $starID = createStarAndPlanets($x,$y,$mapID);
    $starQ = mysqli_query($con, "SELECT starGen_ID,starGen_name FROM star_generated WHERE starGen_ID='$starID'");
    $starA = mysqli_fetch_array($starQ);
    $starName = $starA['starGen_name'];
    $systemName = $starName . " System";
    // update data query
    $updateMapQ = mysqli_query($con, "UPDATE map_generated SET mapGen_star='$starID',mapGen_name='$systemName' WHERE mapGen_id='$mapID'");
    if (!$updateMapQ){
      print mysqli_error($con);
      return;
    }
  }
  return;
}
// ------------------------------------------------------------------------------------------------------------------------------------------------------
// CREATE STAR
function createStarAndPlanets($x,$y,$mapID){
  // init and includes
  include "includes/dbConfig.php";
  // query random model
  $modelQ = mysqli_query($con, "SELECT * FROM star_model ORDER BY RAND() LIMIT 1");
  $modelA = mysqli_fetch_array($modelQ);
  // get model diamater
  $modelDiameterParams = explode(";", $modelA['model_diameter_range']);
  $diamMin = $modelDiameterParams[0];
  $diamMax = $modelDiameterParams[1];
  $diam = rand($diamMin,$diamMax);
  // get model heat
  $modelHeatParams = explode(";", $modelA['model_heat_range']);
  $heatMin = $modelHeatParams[0];
  $heatMax = $modelHeatParams[1];
  $heat = rand($heatMin,$heatMax);
  // get gravity
  $gFactor = getSetting(4);
  $gravity = round($diam / $gFactor);
  // get IMG
  $img = genStarIMG();
  // get name
  $name = genStarName();
  // get modelID
  $modelID = $modelA['model_id'];
  // insert query star
  $insertQ = mysqli_query($con, "INSERT INTO star_generated (starGen_name,starGen_diameter,starGen_heat,starGen_gravity,starGen_map,starGen_model,starGen_image) VALUES ('$name','$diam','$heat','$gravity','$mapID','$modelID','$img')");
  // execute query
  if (!$insertQ){
    print mysqli_error($con);
    return;
  }
  $id = mysqli_insert_id($con);
  return $id;
}
// ------------------------------------------------------------------------------------------------------------------------------------------------------
// GET GENERATED MAP ID BY LOC
function getGeneratedMapID($x,$y){
  // includes and init
  include "includes/dbConfig.php";
  // query maps
  $q = mysqli_query($con, "SELECT * FROM map_generated WHERE mapGen_x='$x' AND mapGen_y='y'");
  $a = mysqli_fetch_array($q);
  $id = $a['mapGen_id'];
  return $id;
}
// ------------------------------------------------------------------------------------------------------------------------------------------------------
// GENERATE RANDOM STAR NAME
function genStarName(){
  // includes and init
  include "includes/star_names_list.php";
  // randomise and pick name from array
  $randomIndex = array_rand($starNamesArray);
  $name = $starNamesArray[$randomIndex];
  // return single name string
  return $name;
}
// ------------------------------------------------------------------------------------------------------------------------------------------------------
// GENERATE RANDOM STAR IMAGE
function genStarIMG(){
  // includes and init
  include "includes/dbConfig.php";
  // get max number of tiles
  $maxNumImages = getSetting(5);
  // get random tile
  $imgNumber = rand(1,$maxNumImages);
  // format image name
  $img = "star_model_" . $imgNumber;
  return $img;
}
// ------------------------------------------------------------------------------------------------------------------------------------------------------
// CALCULATE ODDS TO GENERATE STAR
function odds_star(){
  $percent = getSetting(3);
  $negativeOdds = 100 - $percent;
  $counterYES = 0;
  $counterNO = 0;
  $answerArray = array();
  // loop insert YES
  while ($counterYES <= $percent){
    $counterYES++;
    array_push($answerArray, "YES");
  }
  // loop insert NO
  while ($counterNO <= $negativeOdds){
    $counterNO++;
    array_push($answerArray, "NO");
  }
  // define final random answer from percentage array
  $randomIndex = array_rand($answerArray);
  $answer = $answerArray[$randomIndex];
  // format answer to boolean
  if ($answer == "YES"){
    $out = true;
  }
  else{
    $out = false;
  }
  // return boolean
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------------------------------
// GENERATE MAP TILE IMAGE
function genMapTileIMG(){
  // includes and init
  include "includes/dbConfig.php";
  // get max number of tiles
  $maxNumTiles = getSetting(2);
  // get random tile
  $tileNumber = rand(1,$maxNumTiles);
  // format image name
  $img = "Maptile_" . $tileNumber;
  return $img;
}
// ------------------------------------------------------------------------------------------------------------------------------------------------------
// MOVE TO TILE
function moveTo($x,$y){
  // includes & init
  include "includes/dbConfig.php";
  // query update
  $shipID = getActiveMothership();
  $updateQ = mysqli_query($con, "UPDATE unit_table SET unit_posX='$x',unit_posY='$y' WHERE unit_id='$shipID'");
  // run query
  if (!$updateQ){
    print mysqli_error($con);
    return;
  }
  return;
}
// ------------------------------------------------------------------------------------------------------------------------------------------------------
?>
