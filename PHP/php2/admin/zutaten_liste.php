<?php
include_once "functions.php";
is_logged_in();


include "header.php";
echo "<div class=\"container-fluid\">";

  echo "<h1>Zutatenliste</h1>";
  echo "<a href=\"zutaten_neu.php\">neue Zutat anlegen</a>";
  echo "<br />";
  echo "<br />";

  echo "<table border=1>";
  echo "<tr>";
  echo "<th>Titel</th>";
  echo "<th>Optionen</th>";
  echo "</tr>";
  $zutaten = query("SELECT * FROM zutaten ORDER BY titel;");
  while($row = mysqli_fetch_assoc( $zutaten ))
  {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row["titel"]) . "</td>";
    echo "<td>";
    echo "<a href=\"zutaten_bearbeiten.php?id={$row["id"]}\">bearbeiten</a>";
    echo "&nbsp;-&nbsp;";
    echo "<a href=\"zutaten_entfernen.php?id={$row["id"]}\">löschen</a>";
    echo "</td>";
    echo "</tr>";
  }
  echo "</table>";
echo "</div>";
include "footer.php";
 ?>
