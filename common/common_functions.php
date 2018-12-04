<?php
// LOGOUT REACTION
if (isset($_GET['logout'])){
  if ($_GET['logout'] > 0){
    logout();
    return;
  }
}
// ------------------------------------------------------------------------------------------------------------------------------
// GAMEVIEW CHECKER > REDIRECT IF NONE
function fixGameView(){
  if (!isset($_GET['gameView'])){
    header("Location: /game_index.php?gameView=overview");
  }
  return;
}
// ------------------------------------------------------------------------------------------------------------------------------
// LOAD STRING FROM FOLDER
function getString($id){
  $fName = "strings/" . $id . ".txt";
  $out = "<!-- STRING FILE ID: ".$id." --!>";
  $out .= file_get_contents($fName);
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------
// LOGOUT
function logout(){
  include "includes/dbConfig.php";
  // vars
  $uID = getUserID();
  // delete SQL session
  $delQ = mysqli_query($con, "DELETE FROM user_session WHERE session_userID='$uID'");
  // php session destroyer
  session_destroy();
  session_unset();
  unset($_SESSION['player']);
  // redirect homepage
  header("Location: /");
  return;
}
// ------------------------------------------------------------------------------------------------------------------------------
// GET USER ID
function getUserID(){
  $out = $_SESSION['player'];
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------
// GET USER EMAIL
function getUserEmail(){
  include "includes/dbConfig.php";
  $id = $_SESSION['player'];
  $uQ = mysqli_query($con, "SELECT email,id FROM user WHERE id='$id'");
  $uA = mysqli_fetch_array($uQ);
  $out = $uA['email'];
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------
// GENERATE DEFAULT TIME
function getTime(){
  $now = time();
  $now = date('y-m-d - H:i:s');
  return $now;
}
// ------------------------------------------------------------------------------------------------------------------------------
// GET VISITOR IP
function getIP(){
  if ( getenv("HTTP_CLIENT_IP") ) {
        $ip = getenv("HTTP_CLIENT_IP");
    } elseif ( getenv("HTTP_X_FORWARDED_FOR") ) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
        if ( strstr($ip, ',') ) {
            $tmp = explode(',', $ip);
            $ip = trim($tmp[0]);
        }
    } else {
        $ip = getenv("REMOTE_ADDR");
    }
  return $ip;
}
// ------------------------------------------------------------------------------------------------------------------------------
// GET SERVER SIDED SESSION
function getUserSession(){
  include "includes/dbConfig.php";
  $id = getUserID();
  $ip = getIP();
  $getSessionQ = mysqli_query($con, "SELECT * FROM user_session WHERE session_userID='$id' AND session_ip='$ip'");
  $sessionCheck = mysqli_num_rows($getSessionQ);
  // validate if there is session
  if ($sessionCheck < 1){
    $sessionID = 0;
  }
  else{
    $sessionA = mysqli_fetch_array($getSessionQ);
    $sessionID = $sessionA['session_id'];
  }
  return $sessionID;
}
// --------------------------------------------------------------------------------------------------------------------------------------------
// GET GAME SETTINGS
function getSetting($settingID){
  // include
  include "includes/dbConfig.php";
  // query settings
  $settingsQuery = mysqli_query($con, "SELECT * FROM game_settings WHERE game_setting_id=".$settingID."");
  $settingsArray = mysqli_fetch_array($settingsQuery);
  $setting = $settingsArray['game_setting_value'];
  // return 
  return $setting;
}
// --------------------------------------------------------------------------------------------------------------------------------------------
?>
