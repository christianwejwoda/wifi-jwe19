<div class="container-fluid">
  <div class="row">
    <div class="col-1">
    </div>

    <div class="col-11">
      <div class="row">
        <form class="" action="savedata.php" method="post">
          <h2>Produkte:</h2>
          <?php
          $_SESSION["calling_page"] = "produkte";

          echo '<div class="form-group row">';
          echo '<div class="col-3"></div>';
          echo '<label class="form-label col-7">Titel</label>';
          echo '<label class="form-label col-2">Preis</label>';
          echo '</div>';

            while($row = mysqli_fetch_assoc( $produkte ))
            {
              echo '<div class="form-group row">';
              echo '<label class="form-label col-3" for="produkt_' . $row["id"] . '_titel">Produkt ' . $row["id"] . ': </label>';
              echo '<input class="form-control col-7" type="text" name="produkt_' . $row["id"] . '_titel" id="produkt_' . $row["id"] . '_titel" value="' . htmlspecialchars($row["titel"]) . '">';
              echo '<input class="form-control col-2 text-right" type="text" name="produkt_' . $row["id"] . '_preis" id="produkt_' . $row["id"] . '_preis" value="' . str_replace('.',',',htmlspecialchars($row["preis"])) . '">';
              echo '</div>';
            }
            echo '<div class="form-group row">';
            echo '<label class="form-label col-3" for="produkt_neu_titel">Produkt NEU: </label>';
            echo '<input class="form-control col-7" type="text" name="produkt_neu_titel" id="produkt_neu_titel" value="">';
            echo '<input class="form-control col-2" type="text" name="produkt_neu_preis" id="produkt_neu_preis" value="">';
            echo '</div>';

            if (!empty($_SESSION["save_error"])) {
              echo "<p>{$_SESSION["save_error"]}</p>";
            }
           ?>
          <div>
            <button class="btn-send" type="submit" >abschicken</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
