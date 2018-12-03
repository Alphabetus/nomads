<?php
// CHANGE PASSWORD ACTION
function changePassword($oldPass,$newPass,$newPass2){;
  include "includes/dbConfig.php";
  include "functions/registration_functions.php";
  $id = getUserID();
  $oldPass = password_encrypt($oldPass);
  $out = true;
  // validate password length
  if(!checkPassword($newPass)){
    $out = false;
    return $out;
  }
  // validate new passwords match
  if(!password_validation($newPass,$newPass2)){
    $out = false;
    return $out;
  }
  // validate old password
  $passQ = mysqli_query($con, "SELECT username,id,password FROM user WHERE id='$id' AND password='$oldPass'");
  $passCheck = mysqli_num_rows($passQ);
  if ($passCheck < 1){
    $out = false;
    return $out;
  }
  // change passwords
  $newPass = password_encrypt($newPass);
  $updateQ = mysqli_query($con, "UPDATE user SET password='$newPass' WHERE id='$id'");
  if (!$updateQ){
    print mysqli_error($con);
    $out = false;
    return $out;
  }
  return $out;
}
// ---------------------------------------------------------------------------------------------------------
// CHANGE EMAIL ACTION
function changeUserEmail($newMail){
  include "includes/dbConfig.php";
  include "functions/registration_functions.php";
  $out = true;
  $id = getUserID();
  // validate new email
  if (!isEmailFree($newMail)){
    $out = false;
    return $out;
  }
  // change email
  $newMail = mysqli_escape_string($con, $newMail);
  $updateQ = mysqli_query($con, "UPDATE user SET email='$newMail',active=0 WHERE id='$id'");
  if (!$updateQ){
    print mysqli_error($con);
    $out = false;
    return $out;
  }
  // create activation token
  $token = uniqid();
  $uQ = mysqli_query($con, "SELECT id,username FROM user WHERE id='$id'");
  $uA = mysqli_fetch_array($uQ);
  $username = $uA['username'];
  $createQ = mysqli_query($con, "INSERT INTO user_token (token_username,token_token) VALUES ('$username','$token')");
  if(!$createQ){
    print mysqli_error($con);
    $out = false;
    return $out;
  }
  // send activation email
  $activationLink = "http://nomads.followarmy.com/?view=activation&token=" . $token;
  $to = $newMail;
  $subject = "Nomads - Email changed.";
  $message = "
    <html>
      <body>
        Hello ".$username.".<br>
        <br>
        You requested an email change on your account.<br>
        To reactivate your account and resume playing please click on the link below.<br>
        <a href='".$activationLink."'>".$activationLink."</a><br>
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
  // return
  return $out;
}
// ---------------------------------------------------------------------------------------------------------
// DELETE ACCOUNT ACTION
function deleteUser($pass){
  include "includes/dbConfig.php";
  include "functions/registration_functions.php";
  $out = true;
  // validate password
  $pass = password_encrypt($pass);
  $uID = getUserID();
  $uQ = mysqli_query($con, "SELECT id,password FROM user WHERE password='$pass' AND id='$uID'");
  $uCheck = mysqli_num_rows($uQ);
  if ($uCheck < 1){
    $out = false;
    return $out;
  }
  // validations should be placed above this line
  // validations done > delete session
  $delSessQ = mysqli_query($con, "DELETE FROM user_session WHERE session_userID='$uID'");
  // validations done > delete user
  $deleteQ = mysqli_query($con, "DELETE FROM user WHERE id='$uID'");
  if (!$deleteQ OR !$delSessQ){
    $out = false;
    print mysqli_error($con);
    return $out;
  }
  return $out;
}
// ---------------------------------------------------------------------------------------------------------
?>
