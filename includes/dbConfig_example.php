<?php
// SETTINGS FOR THE CONNECTION
$location = "INSERT THE IP FOR YOUR MYSQL SERVER HERE";
$username = "INSERT YOUR DB USERNAME HERE";
$password = "INSERT YOUR DB PASSWORD HERE";
$dbName = "INSERT YOUR DB NAME HERE";
// RUN AND TEST
$con = mysqli_connect($location,$username,$password,$dbName);
if (mysqli_connect_errno()){
    print "Failed to connect to MySQL: " . mysqli_connect_error();
    return;
  }
?>
