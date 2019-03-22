<?php
include_once "functions.php";
is_logged_in();


$errors = array();
$erfolg = false;
$sql_id = 0;

include "header.php";
echo "<div class=\"container-fluid\">";

echo "<h1>Zutaten löschen</h1>";

if (empty($_GET["id"])) {
  $errors[] = "illegaler Aufruf. Die ID ist nicht vorhanden.";
} else {
  $sql_id = escape($_GET["id"]);
}

$result = query("SELECT * FROM zutaten WHERE id = '{$sql_id}';");
$row = mysqli_fetch_assoc($result);
if (empty($row)) {
  echo "<p>Diese Zutat ist nicht (mehr) vorhanden.</p>";
  echo "<p><a href=\"zutaten_liste.php\">Zurück zur Liste</a></p>";
} else if (!empty($_GET["doit"])) {

  $result = query("SELECT count(distinct rezept_id) as anzahl FROM rezepte_zu_zutaten WHERE zutaten_id = '{$sql_id}';");
  $test = mysqli_fetch_assoc($result);
  if ($test["anzahl"] > 0) {
    echo "<p>Die Zutat <strong>{$row["titel"]}</strong> wird noch in ";
    if ($test["anzahl"] == 1) {
      echo $test["anzahl"] . " Rezept";
    } else {
      echo $test["anzahl"] . " Rezepten";
    }
    echo " verwendet und darf daher nicht gelöscht werden.</p>";
    echo "<p><a href=\"zutaten_liste.php\">Zurück zur Liste</a></p>";

  } else {

    query("DELETE FROM zutaten WHERE id = '{$sql_id}';");
    echo "<p><strong>Zutat erfolgreich entfernt.</strong></p>";
    echo "<p><a href=\"zutaten_liste.php\">Zurück zur Liste</a></p>";

  }
} else {

  echo print_error_ul($errors);

  // $result = query("SELECT * FROM zutaten WHERE id = '{$sql_id}';");
  // $row = mysqli_fetch_assoc($result);


  echo "<p>Sind Sie sicher das Sie die Zutat <strong>";
  echo htmlspecialchars($row["titel"]);
  echo "</strong> entfernen möchten?</p>";

  echo "<a href=\"zutaten_liste.php\">Nein, abbrechen</a><br /><br />";
  echo "<a href=\"zutaten_entfernen.php?id={$_GET["id"]}&amp;doit=1\">Ja, entfernen</a>";
}
  echo "</div>";
 include "footer.php";
?>
