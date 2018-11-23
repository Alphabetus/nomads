<?php
// LOAD STRING FROM FOLDER
function getString($id){
  $fName = "strings/" . $id . ".txt";
  $out = file_get_contents($fName);
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------
?>
