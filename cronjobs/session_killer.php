<?php
// initial prints
print "\n";
print "OUTDATED SESSION KILLER\n";
print "-------------------------\n";
$directory_array = explode('/',__DIR__);
$dir = "/" . $directory_array[1] . "/" . $directory_array[2] . "/" . $directory_array[3] . "/includes/dbConfig.php";
// init
$go = 0;
$nowTS = time();
// includes
include $dir;
// get settings
$validityQ = mysqli_query($con, "SELECT * FROM game_settings WHERE game_setting_name='user_session_validity_minutes'");
$validityA = mysqli_fetch_array($validityQ);
$validity = $validityA['game_setting_value'] * 60;
// time calculations
$timeOffset = $nowTS - $validity;
// get all sessions query
$sessionQ = mysqli_query($con, "SELECT * FROM user_session WHERE session_timestamp < '$timeOffset'");
$count = mysqli_num_rows($sessionQ);
// validation
if ($count > 0){
  // print
  print "SESSIONS DELETED.: ";
  // loop outdated sessions
  while($sess = mysqli_fetch_array($sessionQ)){
    $go++;
    $id = $sess['session_id'];
    $deleteQ = mysqli_query($con, "DELETE FROM user_session WHERE session_id='$id'");
    if (!$deleteQ){
      print "ERRO\n\n";
      return;
    }
  }
  // end loop
  print $go . "\n";
}
else{
  // no outdated sessions to delete
  print "NO SESSIONS NEEDED DELETION.\n\n";
}
// final prints
print "SCRIPT WILL NOW TERMINATE.\n";
print "Made By.: Alphabetus\n\n\n";
?>
