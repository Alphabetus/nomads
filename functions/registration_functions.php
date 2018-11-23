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
// VALIDATE IF USERNAME IS FREE
function isUsernameFree($username){
  include ("includes/dbConfig.php");
  $username = mysqli_escape_string($con, $username);
  $uQ = mysqli_query($con, "SELECT username FROM user WHERE username='$username'");
  $uCount = mysqli_num_rows($uQ);
  if($uCount > 0){
    $out = false;
  }
  else{
    $out = true;
  }
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------
// VALIDATE IF EMAIL IS TAKEN
function isEmailFree($email){
  include ("includes/dbConfig.php");
  $email = mysqli_escape_string($con, $email);
  $out = true;
  $eQ = mysqli_query($con, "SELECT email FROM user WHERE email='$email'");
  $eCount = mysqli_num_rows($eQ);
  if ($eCount > 0){
    $out = false;
  }
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------
// SEND REGISTRATION EMAIL
function sendRegistrationEmail($email,$username,$link){
  $to = $email;
  $subject = "Nomads - Verify your email.";
  $message = "
    <html>
      <body>
        Welcome to Nomads ".$username.".<br>
        <br>
        Your account is ready for activation.<br>
        To activate your account and start playing please click on the link below.<br>
        <a href='".$link."'>".$link."</a><br>
        <br>
        If you have any questions please reach us by email at:<br>
        <a href='mailto:contact@followarmy.com'>contact@followarmy.com</a><br>
        Thank you, have fun.
        <br>
        <br>
      </body>
    </html>
  ";
  $header = 'From: contact@followarmy.com' . "\r\n" .
    'Reply-To: contact@followarmy.com' . "\r\n" .
    'Content-Type: text/html; charset=ISO-8859-1' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

  if(mail($to, $subject, $message, $header)){
    $out = true;
  }
  else{
    $out = false;
  }
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------
// CREATE NEW USER
function createUser($username,$email,$password){
  $out = true;
  include ("includes/dbConfig.php");
  // deal with username
  $username = mysqli_escape_string($con, $username);
  $email = mysqli_escape_string($con, $email);
  $password = mysqli_escape_string($con, $password);
  $createQ = mysqli_query($con, "INSERT INTO user (username,email,password) VALUES ('$username','$email','$password')");
  // deal with activation token
  $saltA = time();
  $saltB = $username;
  $saltC = $email;
  $mix = $saltA . $saltB . $saltC;
  $token = md5($mix);
  $createTokenQ = mysqli_query($con, "INSERT INTO user_token (token_username,token_token) VALUES ('$username','$token')");
  if (!$createQ OR !$createTokenQ){
    print mysqli_error($con);
    $out = false;
    return $out;
  }
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------
?>
