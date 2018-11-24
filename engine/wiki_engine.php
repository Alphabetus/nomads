<?php
include "functions/wiki_functions.php";
// CHECK FOR TOPIC
if (isset($_GET['topic'])){
  // there is topic > switch make page
  switch($_GET['topic']){
    case 'ship':
      include "views/wiki/ship.php";
      break;
    default:
      print "<br><br>404 NOT FOUND";
  }
  return;
}
else{
  // there is no topic > do general page
  $wikiout = "[SOON]";
  return;
}
?>
