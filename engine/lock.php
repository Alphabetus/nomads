<?php
if(!$_SESSION['player']){
  header("Location: /?view=login");
}
else{
  $id = $_SESSION['player'];
  $uQ = mysqli_query($con, "SELECT id FROM user WHERE id='$id'");
  $uCheck = mysqli_num_rows($uQ);
  if ($uCheck < 1){
    logout();
  }
}
?>
