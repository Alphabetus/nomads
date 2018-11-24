<?php
// GET ALL AVAILABLE SHIPS > TABLE
function generateShipsTable(){
  $table = null;
  include "includes/dbConfig.php";
  $shipModelQ = mysqli_query($con, "SELECT * FROM unit_model_table WHERE model_active=1 AND model_type='ship'");
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
      <td class='wikiTableHeader' colspan='6'>
        Available Ships
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
    </tr>
  ";
  // loop for rows
  while($row = mysqli_fetch_array($shipModelQ)){
    // rows
    $table .= "
      <tr>
        <td class='wikiTd' style='width:80px;'>
          <img src='/img/ships/".$row['model_id'].".gif' alt='".$row['model_name']." image' height='75px'/>
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
      </tr>
    ";
  }
  // end table
  return $table;
}
// ---------------------------------------------------------------------------------------------------------------------------------
?>
