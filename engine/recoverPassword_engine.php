<?php
// include
include "functions/recoverPassword_functions.php";
// file
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['recoverPassword'])){
    if(!recoverUserPassword($_POST['email'])){
      $registerOutput = getString("password_reset_error");
      return;
    }
    else{
      $registerOutput = getString("password_reset_ok");
      $registerOutput .= "<br><br>";
      $registerOutput .= "
        <a href='/?view=login' class='greenHrefButton'>
          LOGIN
        </a>
      ";
      return;
    }
  }
  return;
}
return;
?>
