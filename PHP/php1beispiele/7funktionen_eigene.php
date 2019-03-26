<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>eigene Funktionen</title>
  </head>
  <body>
    <h1>eigene Funktionen</h1>

    <?php

    // Funktion zum Umrechen von °C in °F
    // Formel: °F = °C * 1.8 + 32
    echo "<h2>Celsius in Fahrenheit</h2>";

    function celsius2fahrenheit($celsius) {
      return $celsius * 1.8 + 32;
    }
    function fahrenheit2celsius($fahrenheit) {
      return ($fahrenheit - 32) / 1.8;
    }
    echo celsius2fahrenheit(12.5);
    echo "<br />";
    echo celsius2fahrenheit(0);
    echo "<br />";
    echo celsius2fahrenheit(180);
    echo "<br />";
    echo celsius2fahrenheit(5);
    echo "<br />";
    echo celsius2fahrenheit(-25);
    echo "<br />";
    echo fahrenheit2celsius(100);
    echo "<br />";

    // Datum formatieren
    // 2019-02-23 nach 23.02.2019
    echo "<h2>Datum formatieren</h2>";

    function mysqlDate2readabledate_1($mysql_date) {
      $result = substr($mysql_date, 8, 2);
      $result .= ".";
      $result .= substr($mysql_date, 5, 2);
      $result .= ".";
      $result .= substr($mysql_date, 0, 4);

      return $result;
    }

    function mysqlDate2readabledate_2($mysql_date) {
      $date_fields = explode("-",explode(" ",$mysql_date)[0]);
      return $date_fields[2] . "." .  $date_fields[1] . "." .  $date_fields[0];
    }

    function mysqlDate2readabledate_3($mysql_date) {
      $jahr = substr($mysql_date,0,strpos($mysql_date,"-"));
      $rest = substr($mysql_date,strpos($mysql_date,"-") + 1);
      $monat = substr($rest,0,strpos($rest,"-"));
      $tag = substr($rest,strpos($rest,"-") + 1,2);
      return $tag . "." .  $monat . "." .  $jahr;
    }

    function mysqlDate2readabledate_4($mysql_date) {
      $date_fields = explode("-",explode(" ",$mysql_date)[0]);
      krsort($date_fields);
      return implode(".",$date_fields);
    }

    function mysqlDate2readabledate_5($mysql_date) {
      $time = strtotime($mysql_date);
      return date("d.m.Y", $time);
    }

    // $datum = "2019-02-23 12:00:05";
    // $datum = "2011-02-23";
    $datum = "2011-02-23";
    echo mysqlDate2readabledate_1($datum);
    echo "<br />";
    echo mysqlDate2readabledate_2($datum);
    echo "<br />";
    echo mysqlDate2readabledate_3($datum);
    echo "<br />";
    echo mysqlDate2readabledate_4($datum);
    echo "<br />";
    echo mysqlDate2readabledate_5($datum);
    echo "<br />";


    // Zeichenkette abschneiden und "..." anhängen
    echo "<h2>Zeichenkette abschneiden und \"...\" anhängen</h2>";

    function headline($input, $length = 10) {
      if (mb_strlen($input) > $length) {
        $kurzer_text = mb_substr($input,0,$length+1);
        $length = strrpos($kurzer_text," ");
        $kurzer_text = mb_substr($input,0,$length) . "&hellip;";//"...";
      } else {
        $kurzer_text = $input;
      }

      return $kurzer_text;
    }
    $text = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
    // $text = "Lorem ipsäi";
    // echo $text;
    echo headline($text, 15);
    echo "<br />";
    echo headline($text);
    echo "<br />";










    ?>

  </body>
</html>
