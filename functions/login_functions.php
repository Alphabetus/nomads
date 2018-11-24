<?php
// VALIDATE LOGIN DATA AND CREATE SESSION
function loginPlayer(){
  include("functions/registration_functions.php");
  include("includes/dbConfig.php");
  $user = mysqli_escape_string($con, $_POST['username']);
  $pass = password_encrypt($_POST['password']);
  // query for data
  $uQ = mysqli_query($con, "SELECT username,password,id,active FROM user WHERE username='$user' AND password='$pass' AND active=1");
  $uA = mysqli_fetch_array($uQ);
  $uID = $uA['id'];
  $uCheck = mysqli_num_rows($uQ);
  if ($uCheck > 0){
    $_SESSION['player'] = $uID;
    return true;
  }
  else{
    return false;
  }
}
// ------------------------------------------------------------------------------------------------------------------------------
?>
