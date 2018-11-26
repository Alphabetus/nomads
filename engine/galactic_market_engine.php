<?php
// includes
include "functions/galactic_market_functions.php";
// ACTION CHECKS
if(isset($_POST['buy'])){
    if(buyItem($_POST['buy'])){
      $galMarketDisplay .= "<span class='greenText'>";
      $galMarketDisplay .= getString("galactic_market_buy_ok");
      $galMarketDisplay .= "</span>";
    }
    else{
      $galMarketDisplay .= "<span class='errorOutput'>";
      $galMarketDisplay .= getString("galactic_market_buy_fail");
      $galMarketDisplay .= "</span>";
    }
}
// CHECK FOR DEFINED ACTION
if (isset($_GET['action'])){
  switch($_GET['action']){
    case 'buy':
      $galMarketDisplay .= "<h3>BUY ITEMS</h3>";
      $galMarketDisplay .= "<hr>";
      $galMarketDisplay .= genBuyTable();
      break;
    case 'sell':
      $galMarketDisplay = "<h3>SELL ITEMS</h3>";
      $galMarketDisplay .= "<hr>";
      $galMarketDisplay .= "NOT YET";
      break;
    default:
      print "<br><br>ERROR 404: ACTION NOT FOUND<br><br>";
  }
}
?>
