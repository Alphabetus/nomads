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
    // VALIDATE IF USERNAME IS FREE
    if (!isUsernameFree($user)){
      $registerOutput = getString("username_taken");
      return;
    }
    // VALIDATE IF EMAIL IS TAKEN
    if (!isEmailFree($email)){
      $registerOutput = getString("email_taken");
      return;
    }
    // VALIDATIONS SHOULD BE PLACED ABOVE THIS LINE
    //
    // ALL IS SET > SEND CONFIRMATION EMAIL
    if (!sendRegistrationEmail($email,$user,"http://followarmy.com/")){
      $registerOutput = getString("error_sendmail_register");
      return;
    }
    else{
      header("Location: /?view=welcome");
    }
  }
}
?>
