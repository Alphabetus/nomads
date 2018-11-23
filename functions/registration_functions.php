<?php
// ENCRIPT PASSWORD
function password_encrypt($pass){
  $out = md5($pass);
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------
// PASSWORD CONFIRMATION
function password_validation($pass1, $pass2){
  if($pass1 == $pass2){
    $out = true;
  }
  else{
    $out = false;
  }
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------
// EMAIL CONFIRMATION
function email_validation($email1, $email2){
  if ($email1 == $email2){
    $out = true;
  }
  else{
    $out = false;
  }
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------
// VALIDATE IF USERNAME IS GOOD
function usernameSyntax($username){
  $out = true;
  // check special chars
  if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username)){
    $out = false;
  }
  // check for spaces
  if ( preg_match('/\s/',$username) ){
    $out = false;
  }
  // count characters
  if (strlen($username) > 16 OR strlen($username) < 4){
    $out = false;
  }
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------
?>
