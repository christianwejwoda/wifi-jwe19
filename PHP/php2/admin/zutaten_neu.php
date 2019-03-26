<?php
include_once "functions.php";
is_logged_in();


$errors = array();
$erfolg = false;

// Validierung
if (!empty($_POST)) {
  if (empty($_POST["zutat_neu"])) {
    $errors[] = "Bitte gib einen Namen für die Zutat an.";
  } else {
    $val = escape($_POST["zutat_neu"]);
    if (mysqli_num_rows(query("SELECT * FROM zutaten WHERE titel = '{$val}';")) == 0) {
      query("INSERT INTO zutaten SET titel = '{$val}';");
      $erfolg = true;
    } else {
      $errors[] = "Der Produktitel ist bereits vorhanden!";
    }
  }
}

include "header.php";
echo "<div class=\"container-fluid\">";
echo "<h1>Zutaten neu anlegen</h1>";

  if (empty($row)) {
    echo "<p>Diese ist nicht (mehr) vorhanden.</p>";
    echo "<p><a href=\"zutaten_liste.php\">Zurück zur Liste</a></p>";
} else if ($erfolg) {
  echo "<p><strong>Die Zutat '{$_POST["zutat_neu"]}' wurde angelegt.</strong><br />";
  echo "<a href=\"zutaten_liste.php\">Zurück zur Liste</a></p>";
}
  echo print_error_ul($errors);
    ?>
    <div class="container-fluid">
  <form class="" action="zutaten_neu.php" method="post">

    <div class="form-group row">
      <label class="form-label col-2" for="zutat_neu">Titel:</label>
      <input class="form-control col-2 text-left" type="text" name="zutat_neu" id="zutat_neu" value="<?php
      if (!empty($_POST["zutat_neu"]) && !$erfolg) {
        echo htmlspecialchars( $_POST["zutat_neu"]);
      }
       ?>">
    </div>

    <button class="btn-send" type="submit">abschicken</button>

  </form>
</div>


  <?php


include "footer.php";


 ?>
