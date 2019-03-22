<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dateiuploads mit PHP</title>
  </head>
  <body>

    <h1>Dateiuploads mit PHP</h1>

    <?php

    echo "<pre>";print_r($_FILES);echo"</pre>";
    // Formular gesendet?
    if (!empty($_FILES)) {
      // Validierung

      if (empty($error)) {
        if (!empty($_FILES["bild"]["tmp_name"])){
          foreach ($_FILES["bild"]["tmp_name"] as $key => $value) {
            if (!empty($value) && is_uploaded_file($value)) {
              $extension = "";
              if (strpos($_FILES["bild"]["name"][$key],".")>0) {
                $teile = explode(".",$_FILES["bild"]["name"][$key]);
                $extension = "." . mb_strtolower(array_pop($teile));
              }
              $dateiname = md5(microtime().mt_rand(0,1000000).$_FILES["bild"]["name"][$key]) .  $extension;

              move_uploaded_file($value, "uploads/" . $dateiname );
              // $_FILES["bild"]["name"]
            }
          }
        }
      }
    }
     ?>

    <form class="" action="multiupload.php" method="post" enctype="multipart/form-data">

      <div class="">
        <label for="bild">Bild:</label>
        <input type="file" name="bild[]" id="bild" multiple>
        <!-- accept=".pdf" -->
      </div>

      <div class="">
        <button type="submit">Hochladen</button>
      </div>
    </form>

  </body>
</html>
