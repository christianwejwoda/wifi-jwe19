<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>For Schleife</title>
  </head>
  <body>
    <h1>For Schleife</h1>

    // **************************************************
    <h2>1 bis 10 in einer HTML Table ausgeben</h2>
    <table border="1" cellspacing = "0">
      <tr>
        <?php
          for ($spalte=1; $spalte <= 10 ; $spalte++) {
            echo "<td>{$spalte}</td>";
          }
         ?>
     </tr>
    </table>


    // **************************************************
    <h2>1 * 1 in einer HTML Table ausgeben</h2>
    <table border="1" cellspacing = "0">
        <?php
          for ($zeile=0; $zeile <= 10 ; $zeile++) {

            echo "<tr>";
            for ($spalte=0; $spalte <= 10 ; $spalte++) {
              if ($zeile == 0 && $spalte == 0) {
                echo "<td style='background-color: black'></td>";
              }else if ($zeile == 0) {
                echo "<td style='background-color: yellow'>{$spalte}</td>";
              } else if ($spalte == 0) {
                echo "<td style='background-color: yellow'>{$zeile}</td>";
              } else {
                $erg = $zeile * $spalte;
                echo "<td>";
                if ($erg % 7 != 0) {
                  echo $erg;
                }
                echo "</td>";
              }
            }
            echo "</tr>";

          }
         ?>
    </table>

  </body>
</html>
