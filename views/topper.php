<?php
$time = time();
$time = date("H:i:s");
$timeOut = "Server Time.: " . $time;
// logged in topper
if ($_SESSION['player'] > 0){
  $loggedInTopper = "
    <td>
      <a href='/?logout=1'>Logout</a>
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
    <td>
      <?php print $timeOut; ?>
    </td>
    <?php print $loggedInTopper; ?>
  </tr>
</table>
