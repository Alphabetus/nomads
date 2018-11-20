<?php
// home page redirects
if ($_SERVER['REQUEST_URI'] == "/"){
  header('Location: index.php?view=splash');
  return;
}
// -----------------------------------------------------------------------------
?>
