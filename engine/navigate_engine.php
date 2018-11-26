<?php
include "functions/navigate_functions.php";
// VALIDATE MOTHERSHIP NUMBERS
if (!getMotherShips_total()){
  $navigateDisplay = noMotherShipView();
  return;
}

?>
