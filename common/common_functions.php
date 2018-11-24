<?php
// LOGOUT REACTION
if (isset($_GET['logout'])){
  if ($_GET['logout'] > 0){
    logout();
    return;
  }
}
// LOAD STRING FROM FOLDER
function getString($id){
  $fName = "strings/" . $id . ".txt";
  $out = "<!-- STRING FILE ID: ".$id." --!>";
  $out .= file_get_contents($fName);
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------
// LOGOUT
function logout(){
  session_destroy();
  session_unset();
  unset($_SESSION['player']);
  // redirect homepage
  header("Location: /");
  return;
}
// ------------------------------------------------------------------------------------------------------------------------------
?>
