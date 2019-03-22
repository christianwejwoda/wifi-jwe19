<?php

// Wenn jemand frisch zur WebSeite kommt, existiert $_GET["page"] nicht.
// Diese wird erst durch einen Klick auf einen Menüpunkt gesetzt
// Mit dieser Abfrage schaffen wir eine Variable $page die IMMER
// gesetzt ist (Standardwert "home").
if ( empty($_GET["page"]) ) {
  $page = "home";
} else {
  $page = $_GET["page"];
}

// Einzubindende content-Datei ermitteln
switch ($page) {
  case 'about_us':
    $pagetitle = "Über uns - Bakery Konditorei";
    $meta_discription ="Unser Team backt für Sie täglich die frischesten Brötchen.";
    $include_file = "about_us.php";
    break;

  case 'contact':
    $pagetitle = "Kontakt - Bakery Konditorei";
    $meta_discription ="Kontaktieren sie uns gerne.";
    $include_file = "{$page}.php";
    break;

  case 'gallery':
    $pagetitle = "Bildergalerie - Bakery Konditorei";
    $meta_discription ="ein paar Bilder unsere Kreationen.";
    $include_file = "{$page}.php";
    break;

  case 'home':
    $pagetitle = "Bakery Konditorei";
    $meta_discription ="Bakery Konditorei - \"Ihre Lieblingsbäckerei\".";
    $include_file = "{$page}.php";
    break;

  case 'wir-ueber-uns':
    $pagetitle = "unser Team - Bakery Konditorei";
    $meta_discription ="Unsere Mitarbeiter sind immer für Sie da.";
    $include_file = "team.php";
    break;

  default:
    // Seite gibt es bei uns nicht -> error 404 ausgeben
    header("HTTP/1.1 404 Not Found"); // für Suchmaschine
    $pagetitle = "Error 404 - Bakery Konditorei";
    $meta_discription ="Leider ist da was schief gegangen.";
    $include_file = "error404.php";

    break;
}

// html-datei block für block wieder zusammenbauen
require "header.php";

include "content/{$include_file}";
require "footer.php";
