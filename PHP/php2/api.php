<?php
require "admin/functions.php";
header("Content-Type: application/json");
// RESTFul API

// [REQUEST_URI] = /php2/api/zutaten/1?suche=xxxx

//GET-Parameter aus REQUEST_URI entfernen
$request_uri_ohne_get = explode("?",$_SERVER["REQUEST_URI"])[0];
// aus Anfrage-URI die gewünschte Methode ermitteln
$teile = explode("/api/", $request_uri_ohne_get,2);
$parameter = explode("/", $teile[1]);

// array_shift entfernt den ersten wert aus einem array und gibt ihn zurück
// aus diesem lesen wir hier gleich unsere Version raus.
$api_version = ltrim(array_shift($parameter), "vV");
if (empty($api_version)) {
  fehler("Bitte geben Sie eine API-Version an.");
}
// leere Einträge aus dem Parameter-Array entfernen
foreach ($parameter as $key => $value) {
  if (empty($value)) {
    unset($parameter[$key]);
  } else {
    // alle Parameter in Kleinbuchstaben umwandeln, falls diese falsch daherkommen
    $parameter[$key] = mb_strtolower($parameter[$key]);
  }

}

// indizes neu zuordnen falls mit doppelten Schrägstrichen aufgerufen wird
$parameter = array_values($parameter);

if (empty($parameter)) {
  fehler("Nach der Version wurde keine Methode übergeben. Prüfen Sie den Aufruf.");
}
// ab hier ist in $parameter[0] immer die Hauptmethode drin,
// in $parameter[1] die genauere Spezifizierung was angefragt wurde

if ($parameter[0] == "zutaten") {

  // Liste alles Zutaten bzw einer Zutat ausgeben
  $ausgabe = array(
    "status" => 1,
    "result" => array()
  );
  if (empty($parameter[1])) {
    $result = query("SELECT * FROM zutaten ORDER BY id;");
  } else {
    $result = query("SELECT * FROM zutaten WHERE id = '{$parameter[1]}';");
  }
  while ($row = mysqli_fetch_assoc($result)) {
    $ausgabe["result"][] = $row;
  }
  echo json_encode($ausgabe);
  exit;

} if ($parameter[0] == "rezepte") {

  if (empty($parameter[1])) {
    $where="";
    // eine Liste der Rezepte ausgeben

    // suche umsetzen
    if (!empty($_GET["suche"])) {
      $sql_such_wert = escape($_GET["suche"]);
      $where = " WHERE rezepte.titel like '%{$sql_such_wert}%' ";
    }

    $ausgabe = array(
      "status" => 1,
      "result" => array()
    );
    $result = query("SELECT rezepte.id, rezepte.titel, benutzer.benutzername
                  FROM rezepte
                    LEFT JOIN benutzer ON rezepte.benutzer_id = benutzer.id
                  {$where}
                  ORDER BY rezepte.id;");
    while ($row = mysqli_fetch_assoc($result)) {
      $ausgabe["result"][] = $row;
    }

  } else {
    $ausgabe = array(
      "status" => 1
    );
    $sql_rezept_id = escape($parameter[1]);
    $result = query("SELECT rezepte.*
                  FROM rezepte
                  WHERE rezepte.id = '{$sql_rezept_id}';");
    $rezept = mysqli_fetch_assoc($result);
    if (!$rezept) {
      fehler("Die Rezept-ID '$parameter[1]' existiert nicht.");
    }
    $ausgabe["rezept"] = $rezept;

    // Benuntzerdaten auslesen und an die Ausgabe anhöängen
    $result = query("SELECT id, benutzername, email FROM benutzer WHERE id = '{$rezept["benutzer_id"]}';");
    $ausgabe["benutzer"] = mysqli_fetch_assoc($result);

    // Zutaten anfügen
    $zutaten_result = query("SELECT zutaten.*
                              , rezepte_zu_zutaten.menge
                              , rezepte_zu_zutaten.menge_einheit
                    FROM rezepte_zu_zutaten
                      INNER JOIN zutaten on rezepte_zu_zutaten.zutaten_id = zutaten.id
                    WHERE rezepte_zu_zutaten.rezept_id = '{$sql_rezept_id}'
                    order by rezepte_zu_zutaten.id;");
    $ausgabe["zutaten"] = array();
    while ($zutat = mysqli_fetch_assoc($zutaten_result)) {
      $ausgabe["zutaten"] [] = $zutat;
    }

  }

  echo json_encode($ausgabe);
  exit;
} else {
  fehler("Die Methode '{$parameter[0]}' existiert nicht.");
}

// echo"<pre>";print_r($parameter);echo"</pre>";
