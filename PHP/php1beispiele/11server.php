<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Server-Variable</title>
  </head>
  <body>
    <h1>Server-Variable</h1>

    <?php
      phpinfo();
      echo "<pre>";
      print_r($_SERVER);
      echo "</pre>";

     ?>

  </body>
</html>
