<?php
// init
$loggedInTopper = null;
// includes
include "includes/dbConfig.php";
// topper logged out vars
$time = time();
$time = date("H:i:s");
$timeOut = "Server Time.: " . $time;
// check if logged in
if (isset($_SESSION['player'])){
  // get logged in user
  $id = mysqli_escape_string($con, $_SESSION['player']);
  $uQ = mysqli_query($con, "SELECT * FROM user WHERE id='$id'");
  $user = mysqli_fetch_array($uQ);
  $username = $user['username'];
  // design table
  $loggedInTopper = "
    <td>
      ".$username."
    </td>
  ";
}
?>
<table class="topperTable">
  <tr>
    <td>
      <a href="/">
        <b>NOMADS</b>
      </a>
    </td>
    <?php print $loggedInTopper; ?>
    <td>
      <?php print $timeOut; ?>
    </td>
  </tr>
</table>
