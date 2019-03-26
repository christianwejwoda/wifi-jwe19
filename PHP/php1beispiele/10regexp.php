<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RegExp - reguläre Ausdrücke</title>
  </head>
  <body>
    <h1>RegExp - reguläre Ausdrücke</h1>

    <?php

      // Benutzername auf gültige Zeichen validieren
      $benutzername = "C.Wejwoda";
      if ( !preg_match("/[^a-z0-9\.]/i", $benutzername) ) {
        echo "Alles OK, top Benutzername";
      } else {
        echo "Bitte nur a-z, A-Z, 0-9, Punkte verwenden.";
      }


     ?>

  </body>
</html>
