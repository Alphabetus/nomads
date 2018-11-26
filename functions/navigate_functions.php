<?php
// GENERATE VIEW IF THERE IS NO MOTHER SHIPS AVAILABLE
function noMotherShipView(){
  $out = "<center>";
  $out .= getString("navigate_no_motherships");
  $out .= "</center>";
  return $out;
}
// ---------------------------------------------------------------------------------------------------------------------------------------------------
?>
