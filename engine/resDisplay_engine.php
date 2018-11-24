<?php
// get user array
$uID = getUserID();
$uQ = mysqli_query($con, "SELECT * FROM user WHERE id='$uID'");
$uA = mysqli_fetch_array($uQ);
// get Mother Ships
$motherShipQ = mysqli_query($con, "SELECT * FROM unit_table WHERE unit_owner='$uID' AND unit_destroyed=0 AND unit_model=1");
$motherShipsNum = mysqli_num_rows($motherShipQ);
// get Explorer Probes
$explorerQ = mysqli_query($con, "SELECT * FROM unit_table WHERE unit_owner='$uID' AND unit_destroyed=0 AND unit_model=2");
$explorerNum = mysqli_num_rows($explorerQ);
// attribute vars
$workers = $uA['workers'];
$motherships = $motherShipsNum;
$explorers = $explorerNum;
?>
