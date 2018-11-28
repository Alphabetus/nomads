<?php
// init
$loggedInTopper = null;
$topperLogo = null;
// includes
include "engine/topper_engine.php";
?>
<table class="topperTable">
  <tr>
    <td>
      <?php print $topperLogo; ?>
    </td>
    <?php print $loggedInTopper; ?>
    <td>
      <?php print $timeOut; ?>
    </td>
  </tr>
</table>
