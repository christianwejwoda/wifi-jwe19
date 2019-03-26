<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Schleifen</title>
  </head>
  <body>
    <h1>Schleifen</h1>
    <?php

        // set_time_limit(1);

        // ******************************************
        echo "<h2>Schleife die 1 bis 10 ausgibt</h2>";
        $wert = 1;
        while ($wert <= 10) {
          echo $wert;
          echo " ";
          $wert++;
        }

        echo "<br />";

        // ******************************************
        echo "<h2>Array der Reihe nach ausgeben mit foreach</h2>";
        $staedte = array("Salzburg", "Wien", "Linz", "Graz", "Innsbruck");
        asort($staedte);
        foreach ($staedte as $index => $stadt) {
          echo "{$index}: {$stadt}<br />";
        }
        echo "<br />";



        // ******************************************
        echo "<h2></h2>";
        echo "<br />";
    ?>
  </body>
</html>
