<?php
// GENERATE BUY TABLE
function genBuyTable(){
  include "includes/dbConfig.php";
  $table = null;
  // query
  $getItemsQ = mysqli_query($con, "SELECT * FROM galactic_market_buy_table ORDER BY listing_table ASC, listing_currency ASC, listing_value ASC");
  $itemsFieldNum = mysqli_num_fields($getItemsQ);
  // design table start
  $table .= "<table class='wikiTable'>";
  // give title to table
  $table .= "
    <tr>
      <td class='wikiTableHeader' colspan='".$itemsFieldNum."'>
        ALL ACTIVE LISTINGS
        <hr>
      </td>
    </tr>
  ";
  // give title to columns
  $table .= "
    <tr>
      <th class='wikiHeader'>
        Image
      </th>
      <th class='wikiHeader'>
        Name
      </th>
      <th class='wikiHeader'>
        Cost
      </th>
      <th class='wikiHeader'>
        &nbsp;
      </th>
    </tr>
  ";
  // loop
    while($row = mysqli_fetch_array($getItemsQ)){
      $id = $row['listing_model'];
      $db = $row['listing_table'];
      $db = $db . "_model_table";
      $getItemInfoQ = mysqli_query($con, "SELECT * FROM $db _model_table WHERE model_id='$id'");
      $itemInfo = mysqli_fetch_array($getItemInfoQ);
      $name = $itemInfo['model_name'];
      $info = getString($itemInfo['model_description']);
      $formatedValue = number_format($row['listing_value']);
      $table .= "
        <tr>
          <td class='wikiTd' style='width:80px;'>
            <div class='popout' onClick='popOut(".$row['listing_id'].")'>
              <img src='/img/ships/".$row['listing_model'].".gif' alt='Item Image' height='75px'/>
              <span class='popuptext' id='".$row['listing_id']."'><h3>".$name."</h3><hr>".$info."</span>
            </div>
          </td>
          <td class='wikiTd'>
            ".$name."
          </td>
          <td class='wikiTd'>
            ".$formatedValue."&nbsp;".$row['listing_currency']."
          </td>
          <td class='wikiTd'>
            ".genBuyButton($row['listing_id'])."
          </td>
        </tr>
      ";
    }
  // end loop
  $table .= "</table>";
  return $table;
}
// ------------------------------------------------------------------------------------------------------------------------------------------------------
// GENERATE BUY BUTTONS AFTER VALIDATIONS
function genBuyButton($listingID){
  include "includes/dbConfig.php";
  $disabledTag = validateBuy_button($listingID);
  if ($disabledTag == "disabled"){
    $buttonName = "Not enough";
  }
  else{
    $buttonName = "Buy";
  }
  $out = "
    <form method='POST'>
      <input type='hidden' name='buy' value='".$listingID."'/>
      <input type='submit' value='".$buttonName."' class='button_ok' ".$disabledTag."/>
    </form>
  ";
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------------------------------
// VALIDATE BUY BUTTON ACCORDING TO RESOURCES
function validateBuy_button($listingID){
  include "includes/dbConfig.php";
  $uID = getUserID();
  // query item
  $itemQ = mysqli_query($con, "SELECT * FROM galactic_market_buy_table WHERE listing_id='$listingID'");
  $itemA = mysqli_fetch_array($itemQ);
  // get item data
  $cost = $itemA['listing_value'];
  $currency = $itemA['listing_currency'];
  // query user
  $userQ = mysqli_query($con, "SELECT * FROM user WHERE id='$uID'");
  $userA = mysqli_fetch_array($userQ);
  // get user needed data
  $valueHeld = $userA[$currency];
  // compare
  if($cost > $valueHeld){
    $out = "disabled";
    return $out;
  }
  else{
    $out = "";
    return $out;
  }
}
// ------------------------------------------------------------------------------------------------------------------------------------------------------
// BUY ITEM
function buyItem($listingID){
  // init
  $out = false;
  // includes
  include "includes/dbConfig.php";
  $uID = getUserID();
  // query item
  $itemQ = mysqli_query($con, "SELECT * FROM galactic_market_buy_table WHERE listing_id='$listingID'");
  $itemA = mysqli_fetch_array($itemQ);
  // get item data
  $cost = $itemA['listing_value'];
  $currency = $itemA['listing_currency'];
  // query user
  $userQ = mysqli_query($con, "SELECT * FROM user WHERE id='$uID'");
  $userA = mysqli_fetch_array($userQ);
  // get user needed data
  $valueHeld = $userA[$currency];
  // compare
  if ($cost > $valueHeld){
    // no resources > abort
    $out = false;
    return $out;
  }
  else{
    // query item model
    $modelID = $itemA['listing_model'];
    $itemModelQ = mysqli_query($con, "SELECT * FROM unit_model_table WHERE model_id='$modelID'");
    $itemModelA = mysqli_fetch_array($itemModelQ);
    $item_name = $itemModelA['model_name'];
    // enough resources > proceed with charging resources
    $newValueHeld = $valueHeld - $cost;
    $updateResQ = mysqli_query($con, "UPDATE user SET $currency='$newValueHeld' WHERE id='$uID'");
    $insertQ = mysqli_query($con, "INSERT INTO unit_table (unit_model,unit_owner,unit_name) VALUES ('$modelID','$uID','$item_name')");
    // execute queries
    if(!$insertQ OR !$updateResQ){
      print "<br><br>" . mysqli_error($con);
      $out = false;
      return $out;
    }
    // return ok
    $out = true;
    return $out;
  }
  return $out;
}
// ------------------------------------------------------------------------------------------------------------------------------------------------------
?>
