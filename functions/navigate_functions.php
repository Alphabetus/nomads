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
  // get  present tile info
  $loc = getPlayerLoc(getUserID());
  $x = getPlayerPosX();
  $y = getPlayerPosY();
  // SQUARE 1
  $sq1_x = $x - 1;
  $sq1_y = $y - 1;
  $sqID_1 = 1;
  // SQUARE 2
  $sq2_x = $x;
  $sq2_y = $y - 1;
  $sqID_2 = 2;
  // SQUARE 3
  $sq3_x = $x + 1;
  $sq3_y = $y - 1;
  $sqID_3 = 3;
  // SQUARE 4
  $sq4_x = $x - 1;
  $sq4_y = $y;
  $sqID_4 = 4;
  // SQUARE 5 > CENTER
  $sqID_5 = 5;
  // SQUARE 6
  $sq6_x = $x + 1;
  $sq6_y = $y;
  $sqID_6 = 6;
  // SQUARE 7
  $sq7_x = $x - 1;
  $sq7_y = $y + 1;
  $sqID_7 = 7;
  // SQUARE 8
  $sq8_x = $x;
  $sq8_y = $y + 1;
  $sqID_8 = 8;
  // SQUARE 9
  $sq9_x = $x + 1;
  $sq9_y = $y + 1;
  $sqID_9 = 9;
  // generator
  $out = "
  <center>
      <table cellspacing='0' class='navTable'>
        <tr>
          <th class='navHeader' colspan='3'>
              ".$loc."
          </th>
        </tr>
        <!-- ########################################################### ROW 1 ############################################################# -->
        <tr>
          <td class='navStar'>
            <div class='mapBakcground popout' onClick='popOut(".$sqID_1.")' style='background-image: url(/img/map_tiles/".retriveMapTile_img($sq1_x,$sq1_y).".png)'>
              <span class='helper'></span>
              ".getStarImage($sq1_x,$sq1_y)."
              <span class='popuptext' id='".$sqID_1."'>".genTileMechanics($sq1_x,$sq1_y)."</span>
            </div>
          </td>
          <td class='navStar'>
            <div class='mapBakcground popout' onClick='popOut(".$sqID_2.")' style='background-image: url(/img/map_tiles/".retriveMapTile_img($sq2_x,$sq2_y).".png)'>
              <span class='helper'></span>
              ".getStarImage($sq2_x,$sq2_y)."
              <span class='popuptext' id='".$sqID_2."'>".genTileMechanics($sq2_x,$sq2_y)."</span>
            </div>
          </td>
          <td class='navStar'>
            <div class='mapBakcground popout' onClick='popOut(".$sqID_3.")' style='background-image: url(/img/map_tiles/".retriveMapTile_img($sq3_x,$sq3_y).".png)'>
              <span class='helper'></span>
              ".getStarImage($sq3_x,$sq3_y)."
              <span class='popuptext' id='".$sqID_3."'>".genTileMechanics($sq3_x,$sq3_y)."</span>
            </div>
          </td>
        </tr>
        <!-- ########################################################### ROW 2 ############################################################# -->
        <tr>
          <td class='navStar'>
            <div class='mapBakcground popout' onClick='popOut(".$sqID_4.")' style='background-image: url(/img/map_tiles/".retriveMapTile_img($sq4_x,$sq4_y).".png)'>
              <span class='helper'></span>
              ".getStarImage($sq4_x,$sq4_y)."
              <span class='popuptext' id='".$sqID_4."'>".genTileMechanics($sq4_x,$sq4_y)."</span>
            </div>
          </td>
          <td class='navStar'>
            <div class='mapBakcground popout' onClick='popOut(".$sqID_5.")' style='background-image: url(/img/map_tiles/".retriveMapTile_img($x,$y).".png)'>
              <span class='helper'></span>
              ".getStarImage($x,$y)."
              <span class='popuptext' id='".$sqID_5."'>".genTileMechanics($x,$y)."</span>
            </div>
          </td>
          <td class='navStar'>
            <div class='mapBakcground popout' onClick='popOut(".$sqID_6.")' style='background-image: url(/img/map_tiles/".retriveMapTile_img($sq6_x,$sq6_y).".png)'>
              <span class='helper'></span>
              ".getStarImage($sq6_x,$sq6_y)."
              <span class='popuptext' id='".$sqID_6."'>".genTileMechanics($sq6_x,$sq6_y)."</span>
            </div>
          </td>
        </tr>
        <!-- ########################################################### ROW 3 ############################################################# -->
        <tr>
          <td class='navStar'>
            <div class='mapBakcground popout' onClick='popOut(".$sqID_7.")' style='background-image: url(/img/map_tiles/".retriveMapTile_img($sq7_x,$sq7_y).".png)'>
              <span class='helper'></span>
              ".getStarImage($sq7_x,$sq7_y)."
              <span class='popuptext' id='".$sqID_7."'>".genTileMechanics($sq7_x,$sq7_y)."</span>
            </div>
          </td>
          <td class='navStar'>
            <div class='mapBakcground popout' onClick='popOut(".$sqID_8.")' style='background-image: url(/img/map_tiles/".retriveMapTile_img($sq8_x,$sq8_y).".png)'>
              <span class='helper'></span>
              ".getStarImage($sq8_x,$sq8_y)."
              <span class='popuptext' id='".$sqID_8."'>".genTileMechanics($sq8_x,$sq8_y)."</span>
            </div>
          </td>
          <td class='navStar'>
            <div class='mapBakcground popout' onClick='popOut(".$sqID_9.")' style='background-image: url(/img/map_tiles/".retriveMapTile_img($sq9_x,$sq9_y).".png)'>
              <span class='helper'></span>
              ".getStarImage($sq9_x,$sq9_y)."
              <span class='popuptext' id='".$sqID_9."'>".genTileMechanics($sq9_x,$sq9_y)."</span>
            </div>
          </td>
        </tr>
      </table>
      </center>
  ";
  return $out;
}
// ---------------------------------------------------------------------------------------------------------------------------------------------------
// GENERATE MAP MECHANICS POPOUT
function genTileMechanics($x,$y){
  // init & includes
  include "includes/dbConfig.php";
  $out = null;
  $mapTitle = null;
  // validate map existence
  if (!isMapThere($x,$y)){
    // map is not there
    $mapTitle = "Not explored";
  }
  else{
    // map is there > validate default
    if (!isMapDefault($x,$y)){
      // map is not default > get stuff
      $mapQ = mysqli_query($con, "SELECT * FROM map_generated WHERE mapGen_x='$x' AND mapGen_y='$y'");
      $mapA = mysqli_fetch_array($mapQ);
      // var creation
      $mapTitle = $mapA['mapGen_name'];
    }
    else{
      // map is default > get stuff
      $mapQ = mysqli_query($con, "SELECT * FROM map_default WHERE map_X='$x' AND map_Y='$y'");
      $mapA = mysqli_fetch_array($mapQ);
      // var creation
      $mapTitle = $mapA['map_name'];
    }
  }
  // preapre $out var
  $out .= "<h3>".$mapTitle." [ ".$x.":".$y." ]</h3>";
  $out .= "<hr>";
  $out .= "INFORMATION ABOUT SYSTEM POPULATION AND RESOURCES";
  $out .= "<hr>";
  $out .= "BUTTONS";
  // final return
  return $out;
}
// ---------------------------------------------------------------------------------------------------------------------------------------------------
// GET STAR IMAGE BY COORDINATES
function getStarImage($x,$y){
  // init and includes
  include "includes/dbConfig.php";
  $img = null;
  // validate if map is there
  if (!isMapThere($x,$y)){
    // map is not there > end
    return $img;
  }
  else{
    // map is there > get star ID or false if there is none
    $starCheck = isStarThere($x,$y);
    if (!$starCheck){
      // there is no star
      return $img;
    }
    else{
      // there is star > check if default tile or generated
      if (isMapDefault($x,$y)){
        // map is default > get star img
        $starQ = mysqli_query($con, "SELECT * FROM star_default WHERE star_id='$starCheck'");
        $starA = mysqli_fetch_array($starQ);
        $imgName = $starA['star_image']. ".png";
      }
      else{
        // map is generated > get star img
        $starQ = mysqli_query($con, "SELECT * FROM star_generated WHERE starGen_ID='$starCheck'");
        $starA = mysqli_fetch_array($starQ);
        $imgName = $starA['starGen_image']. ".png";
      }
      // return image
      $img = "<img src='/img/stars/".$imgName."' height='50wv'/>";
      return $img;
    }
  }
  return $img;
}
// ---------------------------------------------------------------------------------------------------------------------------------------------------
?>
