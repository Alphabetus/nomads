<?php
include "engine/redirect.php";
?>
<html>
<!--
Open Source Browser Game ~ Space Exploration
Nomads @ 2018. | by Alphabetus
-->
<?php include "includes/head.php" ?>
<body>
  <?php
    $view = $_GET['view'];
    switch($view){
      case 'splash':
        include "views/splash.php";
        break;
      default:
        print "404 NOT FOUND";
    }
  ?>
</body>
<?php include "includes/footer.php" ?>
</html>
