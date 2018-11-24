<?php
// INIT
$registerOutput = null;
// include
include "engine/recoverPassword_engine.php";
?>
<head>
  <title>
    N Recover Password
  </title>
</head>
<div class="mainContainer">
  <div class="splashBoundaries">
    <div class="registerBox">
      <table class="centeredFull">
        <tr>
          <th colspan="2">
            <b><h1>NOMADS - REGISTER</h1></b>
          </th>
        </tr>
        <tr>
          <td class="tableCenter" colspan="2">
            <form method="POST" action="">
              <input type="hidden" name="recoverPassword" value="1"/>
              <input class="regFormInput" type="email" name="email" size="100%" placeholder="Type your registered email..." required/><br>
              <br>
              <input class="button_register" type="submit" size="50" value="RECOVER"/>
            </form>
          </td>
        </tr>
      </table>
      <br>
      <center>
        <span class="errorOutput">
          <b>
            <?php
              print $registerOutput;
            ?>
          </b>
        </span>
      </center>
    </div>
  </div>
</div>
