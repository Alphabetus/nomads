<?php
// RECOVER PASSWORD ENGINE
function recoverUserPassword($email){
  include "functions/registration_functions.php";
  include "includes/dbConfig.php";
  $out = true;
  $email = mysqli_escape_string($con, $email);
  // validate existent account
  $uQ = mysqli_query($con, "SELECT password,email,active,username FROM user WHERE email='$email' AND active='1'");
  $uA = mysqli_fetch_array($uQ);
  $username = $uA['username'];
  $uCheck = mysqli_num_rows($uQ);
  if ($uCheck < 1){
    $out = false;
    return $out;
  }
  // VALIDATIONS MUST BE ABOVE THIS LINE
  // generate new password
  $genPass = genPassword();
  $encryptedPass = password_encrypt($genPass);
  // write new password
  $updateQ = mysqli_query($con, "UPDATE user SET password='$encryptedPass' WHERE email='$email'");
  if (!$updateQ){
    print mysqli_error($con);
    $out = false;
    return $out;
  }
  // send email with new password
  $to = $email;
  $subject = "Nomads - Password reset.";
  $message = "
    <html>
      <body>
        Hello ".$username.".<br>
        <br>
        Your password has been reseted upon your request.<br>
        Your new password is: <b>".$genPass."</b>.<br>
        You can now login using your regular username.<br>
        <br>
        <b>Please be aware that this password was randomly generated, however you should change it as soon as possible.</b><br>
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
  if(!mail($to, $subject, $message, $header)){
    $out = false;
    return $out;
  }
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------
// GENERATE NEW PASSWORD
function genPassword(){
  $salt1 = rand(0,9);
  $salt2 = rand(0,9);
  $salt3 = rand(0,9);
  $salt4 = rand(0,9);
  $salt5 = rand(0,9);
  $salt6 = rand(0,9);
  $newPass = $salt1 . $salt2 . $salt3 . $salt4 . $salt5 . $salt6;
  $out = $newPass;
  return $out;
}
?>
