<?php
// init
$loggedInTopper = null;
// includes
include "engine/topper_engine.php";
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
