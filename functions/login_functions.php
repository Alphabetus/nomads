<?php
// VALIDATE LOGIN DATA AND CREATE SESSION
function loginPlayer(){
  // init
  $query = null;
  // file
  include("functions/registration_functions.php");
  include("includes/dbConfig.php");
  $user = mysqli_escape_string($con, $_POST['username']);
  $pass = password_encrypt($_POST['password']);
  // query for data
  $uQ = mysqli_query($con, "SELECT username,password,id,active FROM user WHERE username='$user' AND password='$pass' AND active=1");
  $uA = mysqli_fetch_array($uQ);
  $uID = $uA['id'];
  $uCheck = mysqli_num_rows($uQ);
  $now = time();
  if ($uCheck > 0){
    // verify session server side
    $ip = getIP();
    $getSessionQ = mysqli_query($con, "SELECT * FROM user_session WHERE session_userID='$uID'");
    $sessionNumbers = mysqli_num_rows($getSessionQ);
    $sessionA = mysqli_fetch_array($getSessionQ);
    $sessionID = $sessionA['session_id'];
    // update or create session
    if ($sessionNumbers > 0){
      // update existent session
      $query = mysqli_query($con, "UPDATE user_session SET session_timestamp='$now', session_ip='$ip' WHERE session_id='$sessionID'");
    }
    else{
      // insert new session
      $query = mysqli_query($con, "INSERT INTO user_session (session_userID,session_timestamp,session_ip) VALUES ('$uID','$now','$ip')");
    }
    // execute query
    if (!$query){
      print "<br><br>" . mysqli_error($con);
      return false;
    }
    // create session php
    $_SESSION['player'] = $uID;
    return true;
  }
  else{
    return false;
  }
}
// ------------------------------------------------------------------------------------------------------------------------------
?>
