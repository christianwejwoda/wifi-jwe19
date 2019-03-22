<?php

session_start();
// verbindung zur Datenbank herstellen
$db = mysqli_connect("localhost", "root", "", "php2");
// MySQL mitteilen, dass unsere Befehle als utf8 kommen
mysqli_set_charset($db, "utf8");

// Befehl zur Datenbank senden  - Kurzform für mysqli_query
function query($statement) {
  global $db;
  $answer = mysqli_query($db, $statement) or die(mysqli_error($db)."<br />".$statement."<br />");
  return $answer;
}

function fehler($message) {
  header("HTTP/1.1 404 Not Found");
  echo json_encode(array(
    "status" => 0,
    "error_message" => $message
  ));
  exit;
}
// Escape-Funktion um SQL-Injektions zu vermeiden
// Daten von Formularen/Benutzer ($_GET oder $_POST)
// IMMER !!! mit mysqli_real_escape_string behandeln,
// bevor sie in Datenbank-Befehlen verwendet werden.
function escape($input) {
  global $db;

  if (is_array($input)) {
    // nur für Arrays
    $answer = array();
    foreach ($input as $key => $value) {
      $answer[$key] = escape($value);
    }
    return $answer;
  } else {
    // string, int, float, .....
    return mysqli_real_escape_string($db, $input);
  }
}

// wenn diese Funktion aufgerufen wird überprüft sie ob man eingeloggt ist.
// falls nicht wird man automatisch zum Login umgeleitet.
function is_logged_in() {
  if (empty($_SESSION["benutzer_id"])) {
    // Loginbereich aufrufen
    header("Location: login.php");
    exit;
  }
}

function print_error_ul($errors) {
  $answer="";
  if (!empty($errors)) {
    $answer .= "<ul>";
    foreach ($errors as $one_error) {
      $answer .= "<li>{$one_error}</li>";
    }
    $answer .= "</ul>";
  }
  return $answer;
}

function first_x_chars($input, $x = 10) {

  $answer = str_replace("\n"," ",$input);
  if (mb_strlen($answer) > $x) {
    $answer = mb_substr($answer, 0, $x + 1 );
    $answer = mb_substr($answer, 0, mb_strrpos($answer, " ", 0)) . "...";
  }

  return $answer;
}
