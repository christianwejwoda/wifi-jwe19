<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/scripts.js"></script>
    <title>Rezepte Administration</title>
  </head>
  <body>
    <nav>
      <div class="container-fluid">
        <ul>
          <li> <a href="index.php">Start</a></li>
          <li> <a href="zutaten_liste.php">Zutaten</a> </li>
          <li> <a href="rezepte_liste.php">Rezepte</a> </li>
          <li> <a href="logout.php">ausloggen</a> (Eingeloggt als: <?php
            echo $_SESSION["benutzer_name"];
           ?>)</li>
        </ul>
      </div>
    </nav>
