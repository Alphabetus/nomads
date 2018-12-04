<?php
include "functions/navigate_functions.php";
// ACTION ON CLICK >> EXPLORE
if (isset($_POST['explore'])){
  // explore new tile and refresh
  generateMap($_POST['x'],$_POST['y']);
}
// ACTION ON CLICK >> MOVE
if (isset($_POST['moveTo'])){
  // move mothership to new tile
  moveTo($_POST['x'],$_POST['y']);
}
// -----------------------------------------------------------------------------
// VALIDATE MOTHERSHIP NUMBERS
if (!getMotherShips_total()){
  $navigateDisplay = noMotherShipView();
  return;
}
// VALIDATIONS SHOULD BE PLACED ABOVE THIS LINE
$navigateDisplay = genNavTable();

?>
