<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if ($_POST['login'] != null){
    include ("functions/login_functions.php");
    if (!loginPlayer()){
      $loginOutput = getString("wrong_login");
      return;
    }
    else{
      header("Location: /game_index.php?gameView=overview");
      return;
    }
  }
}
return;
?>
