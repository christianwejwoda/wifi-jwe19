<?php
include_once "functions.php";
is_logged_in();


include "header.php";
  echo "<div class=\"container-fluid\">";

  echo "<h1>Rezepteliste</h1>";
  echo "<a href=\"rezepte_neu.php\">neues Rezept anlegen</a>";
  echo "<br />";
  echo "<br />";

  echo "<table border=1>";
  echo "<tr>";
  echo "<th>Titel</th>";
  echo "<th>Beschreibung</th>";
  echo "<th>Benutzer</th>";

  echo "<th>Optionen</th>";
  echo "</tr>";
  $result = query("SELECT rezepte.*, benutzer.benutzername
                   FROM rezepte
                      LEFT JOIN benutzer ON rezepte.benutzer_id = benutzer.id
                   ORDER BY rezepte.titel;");
  while($row = mysqli_fetch_assoc( $result ))
  {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row["titel"]) . "</td>";
    echo "<td>" . htmlspecialchars(first_x_chars($row["beschreibung"], 30)) . "</td>";
    echo "<td>" . htmlspecialchars($row["benutzername"]) . "</td>";

    echo "<td>";
      echo "<a href=\"rezepte_bearbeiten.php?id={$row["id"]}\">bearbeiten</a>";
      echo "&nbsp;-&nbsp;";
      echo "<a href=\"rezepte_entfernen.php?id={$row["id"]}\">löschen</a>";
    echo "</td>";
    echo "</tr>";
  }
  echo "</table>";
  echo "</div>";
include "footer.php";
 ?>
