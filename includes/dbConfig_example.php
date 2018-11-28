<?php
// SETTINGS FOR THE CONNECTION
$location = "INSERT THE IP FOR YOUR MYSQL SERVER HERE";
$username = "INSERT YOUR DB USERNAME HERE";
$password = "INSERT YOUR DB PASSWORD HERE";
// IMPORTANT NOTICE
// --
// If you are about to import our SQL dumps without chaning any line of them, Database default name is Nomads.
// Keep that structure otherwise it wont work.
// Before final release is planned to have an installer that will perform the server installation automatically for the user.
// --
// RUN AND TEST
$con = mysqli_connect($location,$username,$password,"Nomads");
if (mysqli_connect_errno()){
    print "Failed to connect to MySQL: " . mysqli_connect_error();
    return;
  }
?>
