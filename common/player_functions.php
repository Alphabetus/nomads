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
    $out = "{LOC TRACKER UNDER DEV}";
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
?>
