<?php
// init
$topperLogo = "<a href='/'>NOMADS</a>";
// includes
include "functions/topper_functions.php";
// topper logged out vars
$time = time();
$time = date("H:i:s");
$timeOut = "Server Time.: " . $time;
// check if logged in
if (isset($_SESSION['player']) AND getUserSession() > 0 AND getUserID() > 0){
  // generate logo
  $topperLogo = "<a href='game_index.php'>NOMADS</a>";
  // get logged in user
  $id = getUserID();
  $uQ = mysqli_query($con, "SELECT * FROM user WHERE id='$id'");
  $user = mysqli_fetch_array($uQ);
  $username = $user['username'];
  // get location
  $location = getPlayerLoc($id);
  // design table
  $loggedInTopper = "
    <td>
      ".$username."
    </td>
    <td>
      ".$location."
    </td>
  ";
}
?>
