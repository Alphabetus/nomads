<?php
// sessions
session_start();
// error display
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// includes
include "engine/redirect.php";
include "common/common_functions.php";
include "common/player_functions.php";
include "includes/dbConfig.php";
include "engine/lock.php";
// url validation
fixGameView();
?>
<html>
<!--
Open Source Browser Game ~ Space Exploration
Nomads @ 2018. | by Alphabetus
-->
<?php include "includes/head.php" ?>
<body>
  <div id="topper">
    <?php include "includes/topper.php"; ?>
  </div>
  <div id="menu">
    <?php include "includes/menu.php"; ?>
  </div>
  <div class="resDisplay">
    <?php include "includes/resDisplay.php"; ?>
  </div>
  <div class="display">
    <?php
      $view = $_GET['gameView'];
      switch($view){
        case 'wiki':
          include "views/game/wiki.php";
          break;
        case 'accountSettings':
          include "views/game/accountSettings.php";
          break;
        case 'overview':
          include "views/game/overview.php";
          break;
        case 'navigate':
          include "views/game/navigate.php";
          break;
        case 'galactic_market':
          include "views/game/galactic_market.php";
          break;
        default:
          print "<br><br>404 NOT FOUND";
      }
    ?>
    <br><br>
  </div>
</body>
<?php include "includes/footer.php" ?>
</html>
