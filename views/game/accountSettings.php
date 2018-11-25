<?php
include "engine/accountSettings_engine.php";
?>
<head>
  <title>
    N Settings
  </title>
</head>
<span class="errorOutput">
  <?php print $outputAccountSettings; ?>
</span>
<h2>Account Settings</h2>
<hr>
<h3>Change Password</h3>
<form method="POST" action="">
  <input type="hidden" name="setting_password_change" value="1"/>
  <input type="password" class="regFormInput" name="oldPassword" placeholder="Old Password..." required/><br>
  <input type="password" class="regFormInput" name="newPassword" placeholder="New Password..." required/><br>
  <input type="password" class="regFormInput" name="newPassword2" placeholder="Confirm new Password..." required/><br>
  <br>
  <input type="submit" class="button_ok" value="Change password"/><br>
</form>
<hr>
<h3>Change Email</h3>
<form method="POST" action="">
  <input type="hidden" name="setting_email_change" value="1"/>
  <input type="email" class="regFormInput" name="newEmail" placeholder="<?php print getUserEmail(); ?>" required/><br>
  <br>
  <input type="checkbox" required/>The new email is valid and working.<br>
  <input type="checkbox" required/>My email will be changed after this step without further confirmation.<br>
  <input type="checkbox" required/>My account will be deactivated until i verify my new email address.<br>
  <br>
  <input type="submit" class="button_ok" value="Change email"/><br>
</form>
<hr>
<h3>Delete Account</h3>
<form method="POST" action="">
  <input type="hidden" name="setting_delete_account" value="1"/>
  <input type="password" class="regFormInput" name="password" placeholder="Insert your password..." required/><br>
  <br>
  <input type="checkbox" required/>I want to permanently delete my account and data.<br>
  <input type="checkbox" required/>My profile will be deleted after this step without further confirmation.<br>
  <br>
  <input type="submit" class="button_notok" value="Delete my Account"/>
</form>
