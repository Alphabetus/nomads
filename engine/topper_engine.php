<?php
// includes
include "functions/topper_functions.php";
// topper logged out vars
$time = time();
$time = date("H:i:s");
$timeOut = "Server Time.: " . $time;
// check if logged in
if (isset($_SESSION['player'])){
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
