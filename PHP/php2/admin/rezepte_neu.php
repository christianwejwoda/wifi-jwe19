<?php
include_once "functions.php";
is_logged_in();


$errors = array();
$erfolg = false;

$benutzer = query("SELECT * FROM benutzer ORDER BY benutzername;");
$zutaten = query("SELECT * FROM zutaten ORDER BY titel;");

// Validierung
if (!empty($_POST)) {
  if (empty($_POST["titel"]) || empty($_POST["beschreibung"])) {
    $errors[] = "Bitte gib einen Titel UND eine Beschreibung für das Rezept an.";
  }

  if (empty($_POST["zutaten_id"]) || empty($_POST["zutaten_id"][0]) ) {
    $errors[] = "Bitte wähle die erste Zutat aus.";
  }

  if (empty($errors)) {
    $sql_titel = escape($_POST["titel"]);
    $sql_beschreibung = escape($_POST["beschreibung"]);
    $sql_benutzer_id = escape($_POST["benutzer_id"]);
    // Rezept selbstg anlegen
    query("INSERT INTO rezepte SET benutzer_id = '{$sql_benutzer_id}', titel = '{$sql_titel}', beschreibung = '{$sql_beschreibung}';");
    // zuordnung zu Zutaten anlegen
    $rezept_neu_id = mysqli_insert_id($db);

    foreach ($_POST["zutaten_id"] as $key => $zutaten_id) {
      if (empty($zutaten_id)) { continue; }

      $sql_zutaten_id = escape($zutaten_id);
      $sql_menge = escape($_POST["menge"][$key]);
      $sql_menge_einheit = escape($_POST["menge_einheit"][$key]);
      query("INSERT INTO rezepte_zu_zutaten
        SET rezept_id = '{$rezept_neu_id}'
          , zutaten_id = '{$sql_zutaten_id}'
          , menge = '{$sql_menge}'
          , menge_einheit = '{$sql_menge_einheit}'
          ;");
    }
    $erfolg = true;
  }
}

include "header.php";
  echo "<div class=\"container-fluid\">";
  echo "<h1>Rezept neu anlegen</h1>";
  echo print_error_ul($errors);

?>

  <form class="left" action="rezepte_neu.php" method="post">

    <div class="form-group row">
      <label class="col-1" for="benutzer_id">Benutzer</label>
      <select class="form-control col-10" name="benutzer_id" id="benutzer_id">
        <?php
        while($ein_benutzer = mysqli_fetch_assoc( $benutzer ))
        {
          echo '<option value="' . $ein_benutzer["id"] . '" ';
          if (!empty($_POST["benutzer_id"]) && !$erfolg && $_POST["benutzer_id"] == $ein_benutzer["id"]) {
            // formular wurde mit Fehler abgeschickt --> mit POST Wert vorausfüllen
            echo " selected ";
          } else if (empty($_POST["benutzer_id"]) && $_SESSION["benutzer_id"] == $ein_benutzer["id"]) {
            // wir sind frisch zum Formular gekommen --> mit SESSION benutzer_id vorausfüllen
            echo " selected ";
          }
          echo '>' . htmlspecialchars($ein_benutzer["benutzername"]) . '</option>';
        }
         ?>
      </select>
    </div>

    <div class="form-group row">
      <label class="form-label col-1" for="titel">Titel:</label>
      <input class="form-control col-10 text-left" type="text" name="titel" id="titel" value="<?php
          if (!empty($_POST["titel"]) && !$erfolg) {
            echo htmlspecialchars( $_POST["titel"]);
          }?>">
    </div>

    <div class="form-group row">
      <label class="form-label col-1" for="beschreibung">Beschreibung:</label>
      <textarea class="form-control col-10" name="beschreibung" id="beschreibung"><?php
            if (!empty($_POST["beschreibung"]) && !$erfolg) {
              echo htmlspecialchars( $_POST["beschreibung"]);
            }?></textarea>
    </div>

    <h3>Zutaten:</h3>

    <div class="zutatenliste">
      <?php
      // ermitteln wieviele Zutatenblöcke wir benötigen (bei vorausfüllung im fehlerfall)
      $bloecke = 1;
      if (!empty($_POST["zutaten_id"]) && !$erfolg) {
        $bloecke = count($_POST["zutaten_id"]);
      }
      for ($i=0; $i < $bloecke; $i++) {
       ?>
        <div class="<?php if($i==0) echo "zutat-leer"; ?>">
          <div class="form-group row">
            <div class="col-4">
            <label class="form-label" for="zutaten_id">Zutat:</label>
            <select class="form-control" name="zutaten_id[]" id="zutaten_id">
              <option value="">&lt;bitte wählen&gt;</option>
              <?php
                mysqli_data_seek($zutaten, 0);
                while($ein_zutat = mysqli_fetch_assoc( $zutaten ))
                {
                  echo '<option value="' . $ein_zutat["id"] . '" ';
                  if (!empty($_POST["zutaten_id"]) && !$erfolg && $_POST["zutaten_id"][$i] == $ein_zutat["id"]) {
                    // formular wurde mit Fehler abgeschickt --> mit POST Wert vorausfüllen
                    echo " selected ";
                  }
                  echo '>' . htmlspecialchars($ein_zutat["titel"]) . '</option>';
                }
               ?>
            </select>
          </div>

            <div class="col-1">
              <label class="form-label" for="menge">Menge:</label>
              <input class="form-control text-left" type="text" name="menge[]" id="menge" value="<?php
                  if (!empty($_POST["menge"]) && !$erfolg) {
                    echo htmlspecialchars( $_POST["menge"][$i]);
                  }?>">
            </div>

            <div class="col-1">
              <label class="form-label" for="menge_einheit">Einheit:</label>
              <input class="form-control text-left" type="text" name="menge_einheit[]" id="menge_einheit" value="<?php
                  if (!empty($_POST["menge_einheit"]) && !$erfolg) {
                    echo htmlspecialchars( $_POST["menge_einheit"][$i]);
                  }?>">
            </div>

          </div>
        </div>
        <?php
        } // ende der FOR-Schleife
        ?>
    </div>

    <div class="">
      <a href="#" class="zutat-neu">Zutat hinzufügen</a>
    </div>

    <div class="">
      <button class="btn-send" type="submit">abschicken</button>
    </div>

  </form>
</div>

<?php
  include "footer.php";
?>
