<div class="mainContainer">
  <div class="splashBoundaries">
    <div class="splashBox">
      <table class="centeredFull">
        <tr>
          <th colspan="2">
            <b><h1>NOMADS - MMORPG</h1></b>
          </th>
        </tr>
        <tr>
          <td class="tableCenter" colspan="2" style="padding-left: 20%; padding-right: 20%; text-align: left!important;">
            <?php
              // get splash text
              $text = file_get_contents("strings/splash_intro.txt");
              print $text;
            ?>
          </td>
        </tr>
        <tr>
          <td class="tableCenter">
            <form method="POST" action="/?view=login">
              <button type="submit" class="button_ok">GO</button>
            </form>
          </td>
          <td class="tableCenter">
            <form method="POST" action="/?view=login">
              <button type="submit" class="button_ok">GO</button>
            </form>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
