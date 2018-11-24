<?php
// LOGOUT REACTION
if (isset($_GET['logout'])){
  if ($_GET['logout'] > 0){
    logout();
    return;
  }
}
// ------------------------------------------------------------------------------------------------------------------------------
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
// GET USER ID
function getUserID(){
  $out = $_SESSION['player'];
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------
// GET USER EMAIL
function getUserEmail(){
  include "includes/dbConfig.php";
  $id = $_SESSION['player'];
  $uQ = mysqli_query($con, "SELECT email,id FROM user WHERE id='$id'");
  $uA = mysqli_fetch_array($uQ);
  $out = $uA['email'];
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------
?>
