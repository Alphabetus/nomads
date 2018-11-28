<?php
include "functions/navigate_functions.php";
// VALIDATE MOTHERSHIP NUMBERS
if (!getMotherShips_total()){
  $navigateDisplay = noMotherShipView();
  return;
}
// VALIDATIONS SHOULD BE PLACED ABOVE THIS LINE
$navigateDisplay = genNavTable();

?>
