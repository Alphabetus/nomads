<?php
// init
$loginOutput = null;
// includes
include ("engine/login_player.php");
?>
<head>
  <title>
    N Login
  </title>
</head>
<div class="mainContainer">
  <div class="splashBoundaries">
    <div class="registerBox">
      <table class="centeredFull">
        <tr>
          <th colspan="2">
            <b><h1>NOMADS - LOGIN</h1></b>
          </th>
        </tr>
        <tr>
          <td class="tableCenter">
            <form method="POST" action="">
              <input type="hidden" name="login" value="1"/>
              <input class="regFormInput" type="text" name="username" size="100%" placeholder="Username" required/><br>
              <br>
              <input class="regFormInput" type="password" name="password" size="100%" placeholder="Password" required/><br>
              <br>
              <input class="button_register" type="submit" size="50" value="LOGIN"/>
            </form>
          </td>
        </tr>
      </table>
      <br>
      <center>
        <span class="errorOutput">
          <b>
            <?php
              print $loginOutput;
            ?>
          </b>
        </span>
      </center>
    </div>
  </div>
</div>
