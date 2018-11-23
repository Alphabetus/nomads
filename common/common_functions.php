<?php
// LOAD STRING FROM FOLDER
function getString($id){
  $fName = "strings/" . $id . ".txt";
  $out = "<!-- STRING FILE ID: ".$id." --!>";
  $out .= file_get_contents($fName);
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------
?>
