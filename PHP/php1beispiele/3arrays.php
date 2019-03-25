<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP Arrays</title>
  </head>
  <body>
<h1>Datentyp: Array</h1>
    <?php

    // Ein numerisches Array erstellen
    $namen = array("Sebastian", "Radi", "Stefan","Johannes");

    echo $namen[1];
    echo "<br />";
    // Sebastian und Stefan
    echo $namen[0] . " und " . $namen[2];
    echo "<br />";
    echo "{$namen[0]} und {$namen[2]}";
    echo "<br />";

    // Im Nachhinein einen Wert anfügen
    print_r($namen);
    echo "<br />";
    $namen[] = "Christian";
    $namen[] = "Franz";
    print_r($namen);
    echo "<br />";
    echo implode(", ",$namen);
    echo "<br />";

    // alles zwischen den eckigen Klammern wird ausgewertet
    // bevor es als Index verwendet wird
    $i = 2;
    echo $namen[ 2 + $i ];
    echo "<br />";


    echo "<br />";
    echo "<b>ein assoziatives Array erstellen</b><br />";
    // ein assoziatives Array erstellen (Index ist ein String)
    $person = array(
      "name" => "Markus",
      "alter" => 46,
      "ort" => "Salzburg"
    );

    echo $person["name"] . " (" . $person["alter"] . ") aus " . $person["ort"] . "<br />";
    echo "{$person["name"]} ({$person["alter"]}) aus {$person["ort"]}<br />";

    // einen Wert an das Array anfügen
    $person["guthaben"] = 180;

    // Inhalt eines Arrays zum debugging ausgeben
    echo "<pre>";print_r($person);echo "</pre>";
    echo "<br />";

    // mehrdimensionale Arrays
    $personen = array(
      array(
        "name" => "Hans",
        "alter" => 57,
        "ort" => "Linz"
      ),
      array(
        "name" => "Julia",
        "alter" => 32,
        "ort" => "Wien"
      ),
      $person
    );
    echo $personen[2]["name"];
    echo "<br />";

    echo "<pre>";print_r($personen);echo "</pre>";
    echo "<br />";


     ?>
  </body>
</html>
