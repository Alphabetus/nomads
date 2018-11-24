<?php
// GET ALL AVAILABLE SHIPS > TABLE
function generateShipsTable(){
  $table = null;
  include "includes/dbConfig.php";
  $shipModelQ = mysqli_query($con, "SELECT * FROM unit_model_table WHERE model_active=1 AND model_type='ship'");
  $shipColsNum = mysqli_num_fields($shipModelQ);
  // string before table
  $table .= "<h3>Additional Notes:</h3>";
  $table .= "<span class='wikiHeaderString'>";
  $table .= getString("wiki_ships_header");
  $table .= "</span>";
  // start table
  $table .= "<table class='wikiTable'>";
  // give title to table
  $table .= "
    <tr>
      <td class='wikiTableHeader' colspan='".$shipColsNum."'>
        ALL ACTIVE SHIPS
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
        ID
      </th>
      <th class='wikiHeader'>
        Name
      </th>
      <th class='wikiHeader'>
        Hit Points
      </th>
      <th class='wikiHeader'>
        Attack
      </th>
      <th class='wikiHeader'>
        Cargo
      </th>
      <th class='wikiHeader'>
        Speed
      </th>
    </tr>
  ";
  // loop for rows
  while($row = mysqli_fetch_array($shipModelQ)){
    // get info
    $info = getShipInfo($row['model_id']);
    // rows
    $table .= "
      <tr>
        <td class='wikiTd' style='width:80px;'>
          <div class='popout' onClick='popOut(".$row['model_id'].")'>
            <img src='/img/ships/".$row['model_id'].".gif' alt='".$row['model_name']." image' height='75px'/>
            <span class='popuptext' id='".$row['model_id']."'><h3>".$row['model_name']."</h3><hr>".$info."</span>
          </div>
        </td>
        <td class='wikiTd'>
          #".$row['model_id']."
        </td>
        <td class='wikiTd'>
          ".$row['model_name']."
        </td>
        <td class='wikiTd'>
          ".$row['model_hitpoints']."
        </td>
        <td class='wikiTd'>
          ".$row['model_attack']."
        </td>
        <td class='wikiTd'>
          ".$row['model_cargo']."
        </td>
        <td class='wikiTd'>
          ".$row['model_speed']."
        </td>
      </tr>
    ";
  }
  // end table
  return $table;
}
// ---------------------------------------------------------------------------------------------------------------------------------
// GENERATE SHIP DESCRITPION
function getShipInfo($modelID){
  include "includes/dbConfig.php";
  $shipQ = mysqli_query($con, "SELECT model_id,model_description FROM unit_model_table WHERE model_id='$modelID'");
  $shipA = mysqli_fetch_array($shipQ);
  $out = getString($shipA['model_description']);
  return $out;
}
// ---------------------------------------------------------------------------------------------------------------------------------
?>
