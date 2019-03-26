<?php
include_once "functions.php";
is_logged_in();


$errors = array();
$erfolg = false;
$sql_id = 0;

include "header.php";
echo "<div class=\"container-fluid\">";

echo "<h1>Rezept löschen</h1>";

if (empty($_GET["id"])) {
  $errors[] = "illegaler Aufruf.";
} else {
  $sql_id = escape($_GET["id"]);
}

$result = query("SELECT * FROM rezepte WHERE id = '{$sql_id}';");
$row = mysqli_fetch_assoc($result);
if (empty($row)) {
  echo "<p>Dieses Rezept ist nicht (mehr) vorhanden.</p>";
  echo "<p><a href=\"rezepte_liste.php\">Zurück zur Liste</a></p>";
} else if (!empty($_GET["doit"])) {

  query("DELETE FROM rezepte WHERE id = '{$sql_id}';");
  echo "<p><strong>Rezept erfolgreich entfernt.</strong></p>";
  echo "<p><a href=\"rezepte_liste.php\">Zurück zur Liste</a></p>";

} else {

  echo print_error_ul($errors);

  echo "<p>Sind Sie sicher das Sie das Rezept <strong>";
  echo htmlspecialchars($row["titel"]);
  echo "</strong> entfernen möchten?</p>";

  echo "<a href=\"rezepte_liste.php\">Nein, abbrechen</a><br /><br />";
  echo "<a href=\"rezepte_entfernen.php?id={$_GET["id"]}&amp;doit=1\">Ja, entfernen</a>";
}
  echo "</div>";
 include "footer.php";
?>
