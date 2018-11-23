<?php
$time = time();
$time = date("H:i:s");
$timeOut = "Server Time.: " . $time;
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
  </tr>
</table>
