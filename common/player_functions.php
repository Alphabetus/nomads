<?php
// GET PLAYER LOCATION
function getPlayerLoc($userID){
  $out = null;
  include "includes/dbConfig.php";
  $uQ = mysqli_query($con, "SELECT id,location_ship FROM user WHERE id='$userID'");
  $uA = mysqli_fetch_array($uQ);
  $locID = $uA['location_ship'];
  // lets define location
  if ($locID == 0){
    // no mother ship
    $getMap = mysqli_query($con, "SELECT * FROM map_default WHERE map_id=1");
    $mapA = mysqli_fetch_array($getMap);
    $loc = "[ ".$mapA['map_X'].":".$mapA['map_Y']." ]";
    $name = $mapA['map_name'];
    // send return
    $out = $name . " " . $loc;
    return $out;
  }
  else{
    // get active location
    $locQ = mysqli_query($con, "SELECT unit_id,unit_posX,unit_posY FROM unit_table WHERE unit_id='$locID'");
    $locA = mysqli_fetch_array($locQ);
    // pos Vars
    $posX = $locA['unit_posX'];
    $posY = $locA['unit_posY'];
    // check if map is default
    $mapDefQ = mysqli_query($con, "SELECT * FROM map_default WHERE map_X='$posX' AND map_Y='$posY'");
    $mapDefNum = mysqli_num_rows($mapDefQ);
    // validate if map is default, if else gets map generated info
    if ($mapDefNum > 0){
      $mapDefA = mysqli_fetch_array($mapDefQ);
      $mapName = $mapDefA['map_name'];
    }
    else{
      // get gen map data
      $mapGenQ = mysqli_query($con, "SELECT * FROM map_generated WHERE mapGen_X='$posX' AND mapGen_Y='$posY'");
      $mapGenA = mysqli_fetch_array($mapGenQ);
      $mapName = $mapGenA['mapGen_name'];
    }
    // define out
    $out = $mapName . " [ ".$posX.":".$posY." ]";
  }
  return $out;
}
// --------------------------------------------------------------------------------------------------------------------------------------------
// GET PLAYER POSITION X
function getPlayerPosX(){
  $userID = getUserID();
  $out = null;
  include "includes/dbConfig.php";
  $uQ = mysqli_query($con, "SELECT id,location_ship FROM user WHERE id='$userID'");
  $uA = mysqli_fetch_array($uQ);
  $locID = $uA['location_ship'];
  // lets define location
  if ($locID == 0){
    // no mother ship
    $getMap = mysqli_query($con, "SELECT * FROM map_default WHERE map_id=1");
    $mapA = mysqli_fetch_array($getMap);
    // send return
    $out = $mapA['map_X'];
    return $out;
  }
  else{
    // get active location
    $locQ = mysqli_query($con, "SELECT unit_id,unit_posX FROM unit_table WHERE unit_id='$locID'");
    $locA = mysqli_fetch_array($locQ);
    // pos Vars
    $posX = $locA['unit_posX'];
    // define out
    $out = $posX;
    return $out;
  }
  return $out;
}
// --------------------------------------------------------------------------------------------------------------------------------------------
// GET PLAYER POSITION Y
function getPlayerPosY(){
  $userID = getUserID();
  $out = null;
  include "includes/dbConfig.php";
  $uQ = mysqli_query($con, "SELECT id,location_ship FROM user WHERE id='$userID'");
  $uA = mysqli_fetch_array($uQ);
  $locID = $uA['location_ship'];
  // lets define location
  if ($locID == 0){
    // no mother ship
    $getMap = mysqli_query($con, "SELECT * FROM map_default WHERE map_id=1");
    $mapA = mysqli_fetch_array($getMap);
    // send return
    $out = $mapA['map_Y'];
    return $out;
  }
  else{
    // get active location
    $locQ = mysqli_query($con, "SELECT unit_id,unit_posY FROM unit_table WHERE unit_id='$locID'");
    $locA = mysqli_fetch_array($locQ);
    // pos Vars
    $posY = $locA['unit_posY'];
    // define out
    $out = $posY;
    return $out;
  }
  return $out;
}
// --------------------------------------------------------------------------------------------------------------------------------------------
// GET PLAYER MOTHERSHIPS
function getMotherShips_total(){
  include "includes/dbConfig.php";
  $id = getUserID();
  $motherShipQ = mysqli_query($con, "SELECT * FROM unit_table WHERE unit_owner='$id' AND unit_model=1 AND unit_destroyed=0");
  $countShips = mysqli_num_rows($motherShipQ);
  if ($countShips < 1){
    $out = false;
    return $out;
  }
  else{
    $out = $countShips;
    return $out;
  }
}
// --------------------------------------------------------------------------------------------------------------------------------------------
// GET PLAYER UNIT TOTALS
function getTotalUnitsByID($id){
  include "includes/dbConfig.php";
  $uID = getUserID();
  $unitQ = mysqli_query($con, "SELECT * FROM unit_table WHERE unit_owner='$uID' AND unit_model='$id' AND unit_destroyed=0");
  $unitNum = mysqli_num_rows($unitQ);
  return $unitNum;
}
// --------------------------------------------------------------------------------------------------------------------------------------------
// GET PLAYER GOLD
function getPlayerGold(){
  include "includes/dbConfig.php";
  $id = getUserID();
  $goldQ = mysqli_query($con, "SELECT id,gold FROM user WHERE id='$id'");
  $goldA = mysqli_fetch_array($goldQ);
  $out = $goldA['gold'];
  return $out;
}
// --------------------------------------------------------------------------------------------------------------------------------------------
// ALTER LAST ACTION FIELD
function updateLastAction(){
  include "includes/dbConfig.php";
  $id = getUserID();
  $ip = getIP();
  $now = getTime();
  $time = time();
  $updateUserQ = mysqli_query($con, "UPDATE user SET lastAction='$now' WHERE id='$id'");
  $updateSessionQ = mysqli_query($con, "UPDATE user_session SET session_timestamp='$time' WHERE session_userID='$id' AND session_ip='$ip'");
  if (!$updateUserQ OR !$updateSessionQ){
    print "<br><br>" . mysqli_error($con);
    return;
  }
  return;
}
// --------------------------------------------------------------------------------------------------------------------------------------------
// ASSIGN MOTHER SHIP AUTOMATICALLY
function assignMotherShip(){
  include "includes/dbConfig.php";
  $id = getUserID();
  // Query to user table to check if location ship is 0
  $userQ = mysqli_query($con, "SELECT id,location_ship FROM user WHERE id='$id' AND location_ship=0");
  $userCount = mysqli_num_rows($userQ);
  // validate results
  if ($userCount > 0){
    // there is no mothership assigned. lets check if he has one.
    if (getMotherShips_total() > 0){
      // he has at least one.
      $getMotherShipQ = mysqli_query($con, "SELECT * FROM unit_table WHERE unit_model=1 AND unit_owner='$id' ORDER BY unit_id ASC LIMIT 1");
      $getMotherShipA = mysqli_fetch_array($getMotherShipQ);
      $motherShipID = $getMotherShipA['unit_id'];
      // write new ship query
      $updateUserQ = mysqli_query($con, "UPDATE user SET location_ship='$motherShipID' WHERE id='$id'");
      // execute query
      if (!$updateUserQ){
        print mysqli_error($con);
        return;
      }
    }
  }
  return;
}
// --------------------------------------------------------------------------------------------------------------------------------------------
// GET PLAYER ACTIVE MOTHERSHIP
function getActiveMothership(){
  // init and include
  include "includes/dbConfig.php";
  // query to get active ship loc.
  $uID = getUserID();
  $shipQ = mysqli_query($con, "SELECT id,location_ship FROM user WHERE id='$uID'");
  $shipA = mysqli_fetch_array($shipQ);
  $shipID = $shipA['location_ship'];
  return $shipID;
}
// --------------------------------------------------------------------------------------------------------------------------------------------
?>
