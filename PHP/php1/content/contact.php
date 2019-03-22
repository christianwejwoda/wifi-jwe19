
<!--

+ Validierung
+ Vorausfüllen bei Fehlern
+ E-Mail an Webseiten-Betreiber
+ Backup der Daten in Datei
+ Erfolgsmeldung
+ Spamschutz

- Select

-->


<?php
// input "name" landet im index des POST Array
// echo "<pre>"; print_r($_POST); echo "</pre>";

$input_error = array();
$form_success = false;
$categories = array(
  "best" => "Bestellung",
  "allgem" => "Allgemein",
  "buch" => "Buchhaltung"
);
// wurde das Formular abgeschickt
if (!empty($_POST)) {

  // Validierung: wurde das Formular richtig ausgefüllt?
  if ( empty($_POST["contactsalutation"]) ) {
    $input_error[] = "Bitte wählen Sie eine Anrede aus.";
  }

  if ( empty($_POST["contactname"]) ) {
    $input_error[] = "Bitte geben Sie Ihren Namen an.";
  } else if (mb_strlen($_POST["contactname"]) < 2) {
    $input_error[] = "Bitte geben mindestens 2 Zeichen in den Namen eingeben.";
  }

  if ( empty($_POST["contactemail"]) ) {
    $input_error[] = "Bitte geben Sie eine E-Mail Adresse ein.";
  } else if ( !preg_match("/^.+@[a-z0-9\-\.]+\.[a-z]{2,15}$/i", $_POST["contactemail"]) ) {
    $input_error[] = "Ihre E-Mail Adresse ist so nicht gültig.";
  }

  if ( !empty($_POST["contactemail_sp"]) ) {
    $input_error[] = "Du bist bestimmt ein Roboter, oder?";
    die;
  }

  if ( empty($_POST["deliverydate"]) ) {
    $input_error[] = "Bitte wählen Sie ein Datum aus.";
  } else if ( !preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}/", $_POST["deliverydate"]) ) {
    $input_error[] = "Das Datum hat kein gültiges Format.";
  }

  if ( empty($_POST["contactcategory"]) ) {
    $input_error[] = "Bitte wähle eine Kategorie.";
  }

  if ( empty($_POST["data_protection"]) ) {
    $input_error[] = "Bitte stimmen Sie der Verarbeitung zu.";
  }

  // Wenn keine Fehler aufgetreten sind E-Mail an Webseiten-Betreiber sende
  if (empty($input_error)) {

    $form_success = true;

    // E-Mail Inhalt zusammenbauen
    if ( empty($_POST["data_protection"]) ) {
      $dsgvo = "Ja";
    } else {
      $dsgvo = "Nein";
    }
    $mail_content = "Kontaktformularanfrage:
Anrede: {$_POST["contactsalutation"]}
Name: {$_POST["contactname"]}
E-Mail: {$_POST["contactemail"]}
Lieferungsdatum: {$_POST["deliverydate"]}
DSGVO: {$dsgvo}

Kategorie: {$categories[$_POST["contactcategory"]]}
Inhalt:
{$_POST["contactmessage"]}
";

      // Anfrage in Datei auf Server speichern (Backup)
      $dateiname = date("Y-m-d_H-i-s");
      file_put_contents("contactbackup/{$dateiname}.txt", $mail_content);

      // E-Mail wirklich senden
      // das @ vor dem "mail" unterdrückt die Fehlermeldungen
      @mail(
        "christian@wejwoda.at", // Empfänger
        "Anfrage von Webseite", // Betreff
        $mail_content, // Inhalt
        "FROM: christian@wejwoda.at\r\n"
        ."Reply-To: {$_POST["contactemail"]}" // zusätzlche Header
      );


  }
}
 ?>

<div class="content">
    <h1>
        Nehmen Sie eine Bestellung auf
    </h1>

    <div class="contact">

        <div class="formular">
                <?php
                  // Fehlermeldungen ausgeben wenn welche aufgetreten sind
                  if (!empty($input_error)) {
                    echo "<ul>";

                    foreach ($input_error as $value) {
                      echo "<li>{$value}</li>";
                    }
                    echo "</ul>";
                  }

                  // Erfolgsmeldung ausgeben wenn alles in Ordnung war
                  if ($form_success) {
                    echo "<h3>Vielen Dank für Ihre Anfrage!</h3>";
                  } else {
                 ?>
                 <form id="contact-form" method="post" action="contact">
                <div class="row">
                    <div class="contactsalutation">
                        <label for="contactsalutation_sir">Herr</label>
                        <input type="radio" id="contactsalutation_sir" name="contactsalutation" value="Herr"<?php
                          if (!empty($_POST["contactsalutation"]) && $_POST["contactsalutation"] == "Herr") {
                            // wenn das erste Kriterium schon false ist dann prüft er das zwiete schon gar nicht mehr
                            echo " checked ";
                          }
                         ?>/>
                        <label for="contactsalutation_maddam">Frau</label>
                        <input type="radio" id="contactsalutation_maddam" name="contactsalutation" value="Frau"<?php
                          if (!empty($_POST["contactsalutation"]) && $_POST["contactsalutation"] == "Frau" ) {
                            echo " checked ";
                          }
                         ?>/>
                        <label for="contactsalutation_company">Firma</label>
                        <input type="radio" id="contactsalutation_company" name="contactsalutation" value="Firma"<?php
                          if (!empty($_POST["contactsalutation"]) && $_POST["contactsalutation"] == "Firma" ) {
                            echo " checked ";
                          }
                         ?>/>
                    </div>
                    <div>
                        <label for="contactname">Name</label>
                        <input type="text" id="contactname" name="contactname" value="<?php
                          if (!empty($_POST["contactname"])) {
                            echo htmlspecialchars($_POST["contactname"]);
                          }
                         ?>" placeholder="Bitte geben Sie Ihren Namen ein" />
                    </div>
                    <div>
                        <label for="contactemail">Emailadresse</label>
                        <input type="email" id="contactemail" name="contactemail" value="<?php
                          if (!empty($_POST["contactemail"])) {
                            echo htmlspecialchars($_POST["contactemail"]);
                          }
                         ?>" placeholder="Bitte geben Sie Ihre Emailadresse ein" />
                    </div>

                    <?php // das nächste Feld ist ein Honeypot / Spam Trap ?>
                    <div class="weg">
                        <label for="contactemail_sp">Emailadresse 2 (bitte nicht ausfüllen)</label>
                        <input type="email" id="contactemail_sp" name="contactemail_sp" />
                    </div>

                    <div>
                        <label for="deliverydate">Wunsch-Lieferungsdatum</label>
                        <input type="date" id="deliverydate" name="deliverydate" value="<?php
                          if (!empty($_POST["deliverydate"])) {
                            echo $_POST["deliverydate"];
                          }
                         ?>">
                    </div>
                    <div>
                      <label for="contactcategory">Kategorie</label>
                      <select class="" id="contactcategory" name="contactcategory">
                        <option value=""></option>
                        <?php

                          foreach ($categories as $cat_key => $cat_value) {
                            echo '<option value="' . $cat_key . '" ';
                            if (!empty($_POST["contactcategory"]) && $_POST["contactcategory"] == $cat_key ) {
                              echo " selected ";
                            }
                            echo '>' . $cat_value . '</option>';
                          }
                         ?>
                      </select>

                    </div>
                    <div>
                        <label for="contactmessage">Nachricht</label>
                        <textarea id="contactmessage" name="contactmessage" placeholder="Details zu Ihrer Bestellung"><?php
                            if (!empty($_POST["contactmessage"])) {
                              echo htmlspecialchars($_POST["contactmessage"]);
                            }
                           ?></textarea>
                    </div>
                    <div>
                        <input type="checkbox" id="data_protection" name="data_protection"<?php
                          if (!empty($_POST["data_protection"])) {
                            echo " checked ";
                          }
                         ?>>
                        <label class="checkbox" for="data_protection" >Ich stimme der Verarbeitung meiner Daten zum Zweck der Kontaktaufnahme zu und akzeptiere die <a href="#">Datenschutzbestimmungen.</a>
                        </label>
                    </div>


                    <div>
                        <input type="submit" value="Bestellen"/>
                    </div>
                </div>
              </form>
                <?php
                } // schließende klammer vom ELSE der Erfolgsmeldung
               ?>
        </div>

        <div class="address">
            <address>
                Konditorei Bakery <br/>
                John Doe <br/>
                Uferweg 10 <br/>
                1001 Wien <br/>
                <br/>
                +43 12 23 45 7 <br/>
                <a href="mailto:stammgast@mcdonalds.at?subject=Anfrage via Website">stammgast@mcdonalds.at</a>
            </address>
        </div>

    </div>

    <h1>
        So einfach finden Sie zu uns
    </h1>

    <div id="google-maps">
        <div class="row">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJZZPhtIEnd0cR_eOgRBaLYwA&key=AIzaSyCv__3DGRe2o9ooic6ToWIu9JMRfWQBkek" width="960" height="450" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>

</div>
