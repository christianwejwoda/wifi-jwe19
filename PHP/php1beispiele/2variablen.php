<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Variablen und Datentypen</title>
  </head>
  <body>
    <h1>Variablen und Datentypen</h1>

    <?php
    // Integer (Ganzzahl) in Variable speichern
    $alter = 47;
    echo $alter;
    echo "<br />";

    // Float (Fließkommazahl) in Variable speichern
    $geld = 9.71;
    echo $geld;
    echo "<br />";

    // String (Zeichenkette, Text) in Variable speichern und verwenden
    $name = "Peter";
    echo "Ich heiße {$name}";
    echo "<br />";

    echo "Ich heiße ";
    echo $name;
    echo "<br />";

    echo "Ich habe "; echo $name; echo "s Stift.";
    echo "<br />";
    // Punkt verknüpft zwei Strings
    echo "Ich habe " . $name . "s Stift.";
    echo "<br />";

    // Variable in geschwungenen Klammern um die Variable abzugrenzen
    echo "Ich habe {$name}s Stift.";
    echo "<br />";

    // Datentyp Boolean definieren
    $wahr = true;
    echo $wahr;
    echo "<br />";
    $unwahr = false;
    echo $unwahr;
    echo "<br />";

    // Datentyp NULL
    $leer = null;
    echo $leer;
    echo "<br />";

    // Konstanten definieren
    define("DB_NAME","db_php1");
    echo DB_NAME;
    echo "<br />";

     ?>

  </body>
</html>
