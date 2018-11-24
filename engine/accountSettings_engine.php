<?php
// includes
include "functions/accountSettings_functions.php";
// init
$outputAccountSettings = null;
// file
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  // change password action
  if (isset($_POST['setting_password_change'])){
    if (!changePassword($_POST['oldPassword'], $_POST['newPassword'], $_POST['newPassword2'])){
      $outputAccountSettings = getString("error_changepass_settings");
      return;
    }
    else{
      $outputAccountSettings = getString("password_change_ok");
      return;
    }
  }
  // change email action
  if (isset($_POST['setting_email_change'])){
    if (!changeUserEmail($_POST['newEmail'])){
      $outputAccountSettings = getString("error_changemail_settings");
      return;
    }
    else{
      logout();
      return;
    }
  }
  // delete account action
  if (isset($_POST['setting_delete_account'])){
    if (!deleteUser($_POST['password'])){
      $outputAccountSettings = getString("error_delete_account") . "<br><br>";
      return;
    }
    else{
      header("Location: /");
      return;
    }
  }
}
?>
