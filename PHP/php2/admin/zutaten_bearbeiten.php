<?php
include_once "functions.php";
is_logged_in();


$errors = array();
$erfolg = false;
$sql_id = 0;


if (!empty($_GET["id"])) {
  $sql_id = escape($_GET["id"]);
}

$result = query("SELECT * FROM zutaten WHERE id = '{$sql_id}';");
$row = mysqli_fetch_assoc($result);
// Validierung
if (!empty($_POST)) {
  if (empty($_POST["titel"])) {
    $errors[] = "Bitte gib einen Namen für die Zutat an.";
  } else {
    $val = escape($_POST["titel"]);
    $result = query("SELECT * FROM zutaten WHERE titel = '{$val}' AND id != '{$sql_id}';");
    $row = mysqli_fetch_assoc($result);
    if ($row) {
      $errors[] = "Der Produktitel ist bereits vorhanden!";
    } else {
      query("UPDATE zutaten SET titel = '{$val}' WHERE id = '{$sql_id}';");
      $erfolg = true;
    }
  }
}
include "header.php";
  echo "<div class=\"container-fluid\">";

  echo "<h1>Zutaten bearbeiten</h1>";
  if (empty($row) and !$erfolg) {
    echo "<p>Diese ist nicht (mehr) vorhanden.</p>";
    echo "<p><a href=\"zutaten_liste.php\">Zurück zur Liste</a></p>";
  } else if ($erfolg) {
    echo "<p><strong>Die Zutat '{$_POST["titel"]}' wurde gespeichert.</strong><br />";
    echo "<a href=\"zutaten_liste.php\">Zurück zur Liste</a></p>";
  }
    echo print_error_ul($errors);

    ?>
    <form class="" action="zutaten_bearbeiten.php?id=<?php echo $sql_id ?>" method="post">

      <div class="form-group row">
        <label class="form-label col-2" for="titel">Titel:</label>
        <input class="form-control col-2 text-left" type="text" name="titel" id="titel" value="<?php
        if (!empty($_POST["titel"]) && !$erfolg) {
          echo htmlspecialchars( $_POST["titel"]);
        } else {
          echo htmlspecialchars( $row["titel"]);
        }
        ?>">

      </div>

      <button class="btn-send" type="submit">speichern</button>

    </form>
  </div>





<?php
 include "footer.php";
?>
