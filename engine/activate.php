<?php
include ("functions/registration_functions.php");
$token = mysqli_escape_string($con, $_GET['token']);
$tokenQ = mysqli_query($con, "SELECT * FROM user_token WHERE token_token='$token'");
$tokenCount = mysqli_num_rows($tokenQ);
// init
$output = null;
// activate engine
if ($tokenCount < 1){
  //token was not found
  $output = getString("error_activation_token");
  $output .= "<br><br>";
  $output .= "
    <center>
      <a href='/?view=login' class='greenHrefButton'>
        LOGIN
      </a>
    </center>
  ";
  return;
}
else{
  // token was found
  if (!activateUser($token)){
    $output = getString("error_fatal_activation_token");
    return;
  }
  else{
    $output = getString("account_activated");
    $output .= "<br><br>";
    $output .= "
      <center>
        <a href='/?view=login' class='greenHrefButton'>
          LOGIN
        </a>
      </center>
    ";
    return;
  }
}
?>
