<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP Funktionen für Strings</title>
  </head>
  <body>
<h1>PHP Funktionen für Strings</h1>
      <?php

        // String in Kleinbuchstaben umwandeln
        $text = "Hallo du bist SEHR groß!";
        echo $text;
        echo "<br />";

        echo strtolower($text);
        echo "<br />";
        echo strtoupper($text);
        echo "<br />";
        echo ucfirst(strtolower($text));
        echo "<br />";
        echo ucwords(strtolower($text));
        echo "<br />";
        // strtolower kann nur ASCII
        // mb_strtolower kann UTF8 und wandelt daher auch Umlaute korrekt um
        echo strtolower("Hallo Äpfel");
        echo "<br />";
        echo mb_strtolower("Hallo Äpfel");
        echo "<br />";

        // Leerzeichen vor/nach einem String entfernen
        $text = "    Willkommen    ";
        echo trim($text);
        echo "<br />";
        echo trim($text,"iW e");
        echo "<br />";
        echo "-" . trim("   hui   ") . "-";
        echo "<br />";

        // HTML Tags aus einem String entfernen
        $text = "Das ä ist <strong>fett</strong> und <em>kursiv</em>.";
        echo $text;
        echo "<br />";
        echo strip_tags( $text);
        echo "<br />";
        echo strip_tags( $text, "<strong>");
        echo "<br />";

        // Länge eines Textes ermitteln
        echo strlen($text);
        echo "<br />";
        echo mb_strlen($text);
        echo "<br />";

        // Einen Teil aus einem String extrahieren
        // es gibt auch negative Werte in den Parametern
        $text = "Er ist 42 Jahre alt.";
        echo substr($text,7,2);
        echo "<br />";
        echo substr($text,7,8);
        echo "<br />";

        // Zeilenumbrüche in <br /> umwandeln
        $text = "Herzlich Willkommen

        im WIFI";
        echo $text;
        echo "<br />";
        echo nl2br($text);
        echo "<br />";

        // Funktionen für Arrays


      ?>

  </body>
</html>
