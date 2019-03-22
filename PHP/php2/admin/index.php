<?php
include_once "functions.php";
is_logged_in();

include "header.php";
 ?>

  <h1>Rezepte-Administrations-Bereich</h1>
  <p>Willkommen im geheimen Admin-Bereich, <?php echo $_SESSION["benutzer_name"] ?>.</p>

 <?php
include "footer.php";
 ?>
