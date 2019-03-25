<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>IF Abfragen</title>
  </head>
  <body>
    <h1>IF Abfragen</h1>

    <?php

    // begrüßung nach Tageszeit
    // Stunde 0 - 5: "Schalf gut"
    // Stunde 6 - 9: "guten Morgen"
    // Stunde 12 und 18: "Mahlzeit"
    // Stunde 19 bis 23: "Gute Nacht"
    // alle anderen: "Hallo!"

    // for ($i = 0; $i <= 23; $i++) {
    //     echo $i . " - ";
    //     $current_hour = $i;
        $current_hour = 15;//date("G");

    if ($current_hour == 12 || $current_hour == 18) {
      echo "Mahlzeit";
    } else if ($current_hour >=0 && $current_hour <= 5) {
      echo "Schlaf gut";
    } else if ($current_hour >= 6 && $current_hour <= 9) {
      echo "Guten Morgen";
    } else if ($current_hour >= 19 && $current_hour <= 23) {
      echo "Gute Nacht";
    } else {
      echo "Hallo!";
    }
    echo "<br />";
  // }

     ?>
  </body>
</html>
