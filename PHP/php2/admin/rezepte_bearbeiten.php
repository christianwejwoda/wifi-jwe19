<?php
include_once "functions.php";
is_logged_in();


$errors = array();
$erfolg = false;
$sql_id = 0;


if (!empty($_GET["id"])) {
  $sql_id = escape($_GET["id"]);
}

$benutzer = query("SELECT * FROM benutzer ORDER BY benutzername;");
$zutaten = query("SELECT * FROM zutaten ORDER BY titel;");

$result = query("SELECT * FROM rezepte WHERE id = '{$sql_id}';");
$row = mysqli_fetch_assoc($result);
// Validierung
if (!empty($_POST)) {
  if (empty($_POST["titel"]) || empty($_POST["beschreibung"])) {
    $errors[] = "Bitte gib einen Titel UND eine Beschreibung für das Rezept an.";
  }
  if (empty($_POST["zutaten_id"]) || empty($_POST["zutaten_id"][0]) ) {
    $errors[] = "Bitte wähle die erste Zutat aus.";
  }

  if (empty($errors)) {
    $sql_post = escape($_POST);
    query("UPDATE rezepte SET benutzer_id = '{$sql_post["benutzer_id"]}', titel = '{$sql_post["titel"]}', beschreibung = '{$sql_post["beschreibung"]}' WHERE id = '{$sql_id}';");

    // alle Zutatenzuordnungen löschen und NEU anlegen
    query("DELETE FROM rezepte_zu_zutaten WHERE rezept_id = '{$sql_id}';");
    foreach ($_POST["zutaten_id"] as $key => $zutaten_id) {
      if (empty($zutaten_id)) { continue; }

      $sql_zutaten_id = escape($zutaten_id);
      $sql_menge = escape($_POST["menge"][$key]);
      $sql_menge_einheit = escape($_POST["menge_einheit"][$key]);
      query("INSERT INTO rezepte_zu_zutaten
        SET rezept_id = '{$sql_id}'
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
  echo "<h1>Rezept bearbeiten</h1>";
  if (empty($row) and !$erfolg) {
    echo "<p>Diese Rezept ist nicht (mehr) vorhanden.</p>";
    echo "<p><a href=\"rezepte_liste.php\">Zurück zur Liste</a></p>";
  } else if ($erfolg) {
    echo "<p><strong>Das Rezept '{$_POST["titel"]}' wurde gespeichert.</strong><br />";
    echo "<a href=\"rezepte_liste.php\">Zurück zur Liste</a></p>";
  }
    echo print_error_ul($errors);

    ?>

    <form class="" action="rezepte_bearbeiten.php?id=<?php echo $sql_id ?>" method="post">

      <div class="form-group row">
        <label class="col-2" for="benutzer_id">Benutzer</label>
        <select class="form-control col-9" name="benutzer_id" id="benutzer_id">
          <option value="">bitte einen Benutzer auswählen</option>
          <?php
          while($ein_benutzer = mysqli_fetch_array( $benutzer ))
          {
            echo '<option value="' . $ein_benutzer["id"] . '" ';
            if (!empty($_POST["benutzer_id"]) && $_POST["benutzer_id"]  == $ein_benutzer["id"] ) {
              echo " selected ";
            } else if ($row["benutzer_id"] == $ein_benutzer["id"]) {
              echo " selected ";
            }
            echo '>' . htmlspecialchars($ein_benutzer["benutzername"]) . '</option>';
          }
           ?>
        </select>
      </div>

      <div class="form-group row">
        <label class="form-label col-2" for="titel">Titel:</label>
        <input class="form-control col-2 text-left" type="text" name="titel" id="titel" value="<?php
            if (!empty($_POST["titel"]) ) {
              echo htmlspecialchars( $_POST["titel"]);
            } else {
              echo htmlspecialchars( $row["titel"]);
            }?>">
      </div>

      <div class="form-group row">
        <label class="form-label col-2" for="beschreibung">Beschreibung:</label>
        <textarea class="form-control col-9" name="beschreibung" id="beschreibung" rows="4" cols="80"><?php
              if (!empty($_POST["beschreibung"]) ) {
                echo htmlspecialchars( $_POST["beschreibung"]);
              } else {
                echo htmlspecialchars( $row["beschreibung"]);
              }?></textarea>
      </div>


      <h3>Zutaten:</h3>

      <div class="zutatenliste">
        <?php
        // ermitteln wieviele Zutatenblöcke wir benötigen (bei vorausfüllung im fehlerfall)
        $bloecke = 1;

        if (!empty($_POST["zutaten_id"]) && !$erfolg) {
          $bloecke = count($_POST["zutaten_id"]);
        } else {
          $result_zutaten = query("SELECT * FROM rezepte_zu_zutaten WHERE rezept_id = '{$sql_id}' ORDER BY id;");
          $bloecke = mysqli_num_rows($result_zutaten);
          $zutaten_zuordnungen = array();
          while ($zuordnung = mysqli_fetch_assoc($result_zutaten)) {
            $zutaten_zuordnungen[] = $zuordnung;
          }
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
                    } else if ((empty($_POST["zutaten_id"]) || $erfolg) && $zutaten_zuordnungen[$i]["zutaten_id"] == $ein_zutat["id"]){
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
                    } else if ((empty($_POST["zutaten_id"]) || $erfolg)) {
                      echo htmlspecialchars( $zutaten_zuordnungen[$i]["menge"]);
                    }?>">
              </div>

              <div class="col-1">
                <label class="form-label" for="menge_einheit">Einheit:</label>
                <input class="form-control text-left" type="text" name="menge_einheit[]" id="menge_einheit" value="<?php
                    if (!empty($_POST["menge_einheit"]) && !$erfolg) {
                      echo htmlspecialchars( $_POST["menge_einheit"][$i]);
                    } else if ((empty($_POST["zutaten_id"]) || $erfolg)) {
                      echo htmlspecialchars( $zutaten_zuordnungen[$i]["menge_einheit"]);
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
        <button class="btn-send" type="submit">speichern</button>
      </div>

    </form>
  </div>






<?php
 include "footer.php";
?>
