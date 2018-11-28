<?php
// GENERATE VIEW IF THERE IS NO MOTHER SHIPS AVAILABLE
function noMotherShipView(){
  $out = "<center>";
  $out .= getString("navigate_no_motherships");
  $out .= "</center>";
  return $out;
}
// ---------------------------------------------------------------------------------------------------------------------------------------------------
// GENERATE NAV TABLE
function genNavTable(){
  // init and includes
  include "includes/dbConfig.php";
  // get tile info
  $loc = getPlayerLoc(getUserID());
  $x = getPlayerPosX();
  $y = getPlayerPosY();
  // get Star info
  $img = getStarImage($x,$y);
  // generator
  $out = "
    <table class='navTable'>
      <tr>
        <th class='navHeader'>
            ".$loc."
        </th>
      </tr>
      <tr>
        <td class='navStar'>
          <div class='mapBakcground' style='background-image: url(/img/map_tiles/solarsystem_1.png)'>
            <span class='helper'></span>
            <img src='/img/stars/".$img."' height='50vw'/>
          </div>
        </td>
        <td class='navStar'>

        </td>
      </tr>

    </table>
  ";
  return $out;
}
// ---------------------------------------------------------------------------------------------------------------------------------------------------
// GET MAP IMAGE BY COORDINATES
function getMapImage($x,$y){
  // init and includes
  include "includes/dbConfig.php";
  // query default
  $defaultQ = mysqli_query($con, "SELECT * FROM map_default WHERE map_X='$x' AND map_Y='$y'");
  $defaultCount = mysqli_num_rows($defaultQ);
  // check if map is default
  if ($defaultCount > 0){
    // map is default > get star ID
    $defaultA = mysqli_fetch_array($defaultQ);
    // image return
    $img = $defaultA['map_image'] . ".png";
    return $img;
  }
  else{
    // map is generated
    print "<br><br> NOT CODED YET";
  }
  return $img;
}
// ---------------------------------------------------------------------------------------------------------------------------------------------------
// GET STAR IMAGE BY COORDINATES
function getStarImage($x,$y){
  // init and includes
  include "includes/dbConfig.php";
  // query default
  $defaultQ = mysqli_query($con, "SELECT * FROM map_default WHERE map_X='$x' AND map_Y='$y'");
  $defaultCount = mysqli_num_rows($defaultQ);
  // check if map is default
  if ($defaultCount > 0){
    // map is default > get star ID
    $defaultA = mysqli_fetch_array($defaultQ);
    $starID = $defaultA['map_star'];
    // query star
    $starQ = mysqli_query($con, "SELECT * FROM star_default WHERE star_id='$starID'");
    $starA = mysqli_fetch_array($starQ);
    // image return
    $img = $starA['star_image'] . ".png";
    return $img;
  }
  else{
    // map is generated
    print "<br><br> NOT CODED YET";
  }
  return $img;
}
// ---------------------------------------------------------------------------------------------------------------------------------------------------
?>
