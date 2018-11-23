<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(null != ($_POST['register'])){
    // VALIDATION FUNCTIONS
    include "functions/registration_functions.php";
    // REGISTRATION STARTED
    $user = $_POST['username'];
    $email = $_POST['email'];
    $email2 = $_POST['email2'];
    $pass = password_encrypt($_POST['password']);
    $pass2 = password_encrypt($_POST['password2']);
    // VALIDATE PASSWORD CONFIRMATION
    if(!password_validation($pass,$pass2)){
      $registerOutput = getString("password_confirm_fail");
      return;
    }
    // VALIDATE EMAIL CONFIRMATION
    if (!email_validation($email,$email2)){
      $registerOutput = getString("email_confirm_fail");
      return;
    }
    // VALIDATE IF USERNAME IS GOOD
    if (!usernameSyntax($user)){
      $registerOutput = getString("bad_username");
      return;
    }
  }
}
?>
