<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Funktionen für Arrays</title>
  </head>
  <body>
    <h1>Funktionen für Arrays</h1>

    <?php

      $namen = array("Franz", "Christian", "Johannes", "Stefan", "Radi", "Sebastian", "Christian", "Markus");

      // Elemente in einem Array zählen
      echo count($namen);
      echo "<br />";

      // Zufälligen Namen ausgeben
      echo $namen[array_rand($namen)];
      echo "<br />";

      // doppelte Einträge entfernen
      $namen_einmalig = array_unique($namen);
      echo count($namen_einmalig);
      echo "<br />";
      $namen_einmalig[]="Hugo";
      echo "<pre>";
      print_r($namen_einmalig);
      echo "</pre>";
      echo "<br />";

      // unterschiede zwischen zwei arrays
      $unterschied = array_diff_assoc($namen, $namen_einmalig);
      echo "Unterschiede: <pre>";
      print_r($unterschied);
      echo "</pre>";
      echo "<br />";

      // prüfen ob im Array ein Wert existiert
      $such_name = "Elisabeth";
      $name_existiert = in_array($such_name,$namen_einmalig);
      if ($name_existiert) {
        echo "{$such_name} ist in der Liste enthalten.";
      }else {
        echo "{$such_name} ist in der Liste nicht zu finden.";
      }
      echo "<br />";

      // Array alphabetisch aufsteigen sortieren
      asort($namen_einmalig);
      echo "asort: <pre>";
      print_r($namen_einmalig);
      echo "</pre>";
      echo "<br />";

      sort($namen_einmalig);
      echo "sort: <pre>";
      print_r($namen_einmalig);
      echo "</pre>";
      echo "<br />";

      // Mehrere Werte an ein Array anhängen
      array_push($namen_einmalig,"Julia","Elisabeth");
      echo "after array_push: <pre>";
      print_r($namen_einmalig);
      echo "</pre>";
      echo "<br />";

      // vorne anhängen
      array_unshift($namen_einmalig,"Maria","Sieglinde");
      echo "after array_unshift: <pre>";
      print_r($namen_einmalig);
      echo "</pre>";
      echo "<br />";

      // sortieren un indeizes neu zuweisen
      sort($namen_einmalig);
      echo "sort: <pre>";
      print_r($namen_einmalig);
      echo "</pre>";
      echo "<br />";


     ?>
  </body>
</html>
