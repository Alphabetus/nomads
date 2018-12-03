<?php
// init td14px
$galMarketDisplay = null;
// includes
include "engine/galactic_market_engine.php";
// file
?>
<head>
  <title>
    N Galactic Market
  </title>
</head>
<h2>GALACTIC MARKET</h2>
<?php print getString("galactic_market_description");?><br>
<br>
<hr>
<table>
  <tr>
    <td class="tableCenter tdVerticalMiddle">
      <form method="GET">
        <input type="hidden" name="gameView" value="galactic_market"/>
        <select name="action" onchange="this.form.submit()">
          <option disabled selected>Select your Action</option>
          <option value="buy">Buy</option>
          <option value="sell">Sell</option>
        </select>
      </form>
    </td>
    <td class="tableCenter tdVerticalTop td14px">
      &nbsp;&nbsp;&nbsp;<?php print getString("galactic_market_motive");?>
    </td>
  </tr>
</table>
<?php print $galMarketDisplay; ?>
