<?php
// home page redirects
if ($_SERVER['REQUEST_URI'] == "/"){
  header('Location: ?view=splash');
  return;
}
// -----------------------------------------------------------------------------
?>
