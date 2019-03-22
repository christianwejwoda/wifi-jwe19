<?php

$passwort = "voyager3103";
echo password_hash($passwort, PASSWORD_DEFAULT);

// password_verify($_POST["passwort"], $db_passwort);

 ?>
