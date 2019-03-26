<?php
  include_once "functions.php";

  // wurde das Formular abgeschickt
  if (!empty($_POST)) {
    // Validierung
    if (empty($_POST["benutzername"]) || empty($_POST["passwort"])) {
      $error = "Benutzername oder Passwort war leer!";
    } else {
      // Benutzer und Passwort wurden übergeben
      // -> in der Datenbank nachsehen, ob der Benutzer existiert

      // --> böse Zeichen escapen
      $sql_benutzername = escape($_POST["benutzername"]);

      // Datenbank fragen ob der angegebene Benutzer existiert
      $result = query("SELECT * FROM benutzer WHERE benutzername='{$sql_benutzername}';");

      // Einen Datensatz aus MySQL in ein PHP-Array umwandeln
      $row = mysqli_fetch_assoc($result);
      if ($row) {
        // Benutzer existiert -> Passwort prüfen
        if (password_verify($_POST["passwort"], $row["passwort"])) {
          // letztes Login und Anzahl Logins in DB speichern

          query("UPDATE benutzer SET letzter_login = NOW(), anzahl_logins = anzahl_logins + 1 WHERE id = '{$row["id"]}';");

          // alles Super --> login merken
          $_SESSION["benutzer_id"] = $row["id"];
          $_SESSION["benutzer_name"] = $row["benutzername"];
          // umleitung ins Admin-System
          header("Location: index.php");
          exit;

        } else {
          // Passwort ist falsch
          $error = "Benutzername oder Passwort falsch.";
        }
      } else {
        // Benutzer nicht in DB --> Fehlermeldung
        $error = "Benutzername oder Passwort falsch.";
      }
    }
  }

 ?><!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Loginbereich - Rezepte</title>
  </head>
  <body>
    <h1>Loginbereich zur Rezeptverwaltung</h1>

    <?php
      // Fehlermeldung ausgeben, wenn eine aufgetreten ist
      if (!empty($error)) {
        echo "<p>{$error}</p>";
      }
     ?>
    <form class="" action="login.php" method="post">

      <div class="">
        <label for="benutzername">Benutzername:</label>
        <input type="text" name="benutzername" id="benutzername" value="" />
      </div>

      <div class="">
        <label for="passwort">Passwort:</label>
        <input type="password" name="passwort" id="passwort" />
      </div>

      <div class="">
        <button type="submit">einloggen</button>
      </div>

    </form>
  </body>
</html>
