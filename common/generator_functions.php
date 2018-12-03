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
?>
