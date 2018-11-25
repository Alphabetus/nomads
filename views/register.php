<?php
// INIT
$registerOutput = null;
// REGISTRATION ENGINE
include "engine/registration.php";
?>
<head>
  <title>
    N Register
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
              <input type="hidden" name="register" value="1"/>
              <input class="regFormInput" type="text" name="username" placeholder="Username" required/><br>
              <br>
              <input class="regFormInput" type="email" name="email" placeholder="Valid Email" required/><br>
              <br>
              <input class="regFormInput" type="email" name="email2" placeholder="Confirm Email" required/><br>
              <br>
              <input class="regFormInput" type="password" name="password" placeholder="Password" required/><br>
              <br>
              <input class="regFormInput" type="password" name="password2" placeholder="Confirm Password" required/><br>
              <br>
              <input class="cursorPointer" type="checkbox" name="tos" value="tos" required>I have read and agreed with the <a href="/?view=tos" target="_blank">Terms and Conditions</a>.<br>
              <input class="cursorPointer" type="checkbox" name="tos" value="tos" required>I have read and agreed with the <a href="/?view=privacy" target="_blank">Privacy Policy</a>.<br>
              <input class="cursorPointer" type="checkbox" name="tos" value="tos" required>I have 13 or more years of age.<br>
              <br>
              <input class="button_register" type="submit" value="REGISTER"/>
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
