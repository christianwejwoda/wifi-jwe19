<div class='wrapper'>
	<div class='row'>
		<div class='col-xs-12'>
			<h1>Registrierung</h1>
		</div>
	</div>
</div>

<?php
// Validierung
$validation_error = array();
$showForm = true;

// - Benutzername
if (!empty($_POST)) {
	$usernamme = $_POST['benutzername'];
	$password = $_POST['passwort'];
	$email = $_POST['email'];
	$agb = "";
	if (!empty($_POST['agb'])) {
		$agb = $_POST['agb'];
	}

	if (mb_strlen($usernamme) < 4) {
		$validation_error[] = "Der Benutzername muss mindestens 4 Zeichen lang sein.";
	}

	if (preg_match("/[^a-zA-Z0-9]/",$usernamme)) {
		$validation_error[] = "Der Benutzername enthält nicht erlaubte Zeichen. Es dürfen nur Klein- und Großbuchstaben und Ziffern enthalten sein. Jedoch keine anderen Zeichen!";
	}

	if (mb_strlen($password) < 6) {
		$validation_error[] = "Das Passwort muss mindestens 6 Zeichen lang sein.";
	}
	if (!preg_match("/[a-z]/",$password)) {
    $validation_error[] = "Das Passwort muss mindestens 1 Kleinbuchstaben enthalten.";
  }
  if (!preg_match("/[A-Z]/",$password)) {
    $validation_error[] = "Das Passwort muss mindestens 1 Großbuchstaben enthalten.";
  }
  if (!preg_match("/[0-9]/",$password)) {
    $validation_error[] = "Das Passwort muss mindestens 1 Ziffer enthalten.";
  }
  if (!preg_match("/[!§$%&\/()=?+\-*]/",$password)) {
    $validation_error[] = "Das Passwort muss mindestens 1 Sonderzeichen enthalten.";
  }

	if (mb_strlen($email) == 0 || !preg_match("/^.+@[a-z0-9\-\.äöüÄÖÜß]+\.[a-z]{2,15}$/i", $email) ) {
    $validation_error[] = "Bitte geben Sie eine gültige E-Mail ein.";
	}

	if (mb_strlen($agb) == 0) {
		$validation_error[] = "Die AGB müssen akzeptiert werden.";
	}

	if (empty($validation_error)) {
		$showForm = false;

		$reg_data = "";
		$reg_data .= "Benutzername: " . $usernamme . "\n";
		$reg_data .= "Passwort: " . $password . "\n";
		$reg_data .= "E-Mail: " . $email . "\n";
		$reg_data .= "AGB: " . (empty($agb) ? "nein" : "ja") . "\n";

		do {
			$filename = "registrierungen/reg" . date('YmdHis') . ".txt";
		} while (file_exists($filename));
		file_put_contents($filename, $reg_data);

		?>
		<div class="wrapper">
			<div class='row'>
				<div class='col-xs-12 col-sm-12'>
					<h2>Vielen Dank für Ihre Registrierung.</h2>
				</div>
			</div>
		</div>
		<?php
	}
	}
	if ($showForm) {
 ?>
 <form id='register-form' method="post" action="index.php?seite=registrieren">
	<div class="wrapper">
		<div class='row'>
			<div class='col-xs-12 col-sm-12'>
				<label for='username'>Benutzername</label>
				<input type='text' id='username' name='benutzername' <?php
				if (!empty($_POST)) {
					echo "value='" . htmlspecialchars($usernamme) . "'";
				} ?> />
			</div>
			<div class='col-xs-12 col-sm-12'>
				<label for='password'>Passwort</label>
				<input type='password' id='password' name='passwort' <?php
				if (!empty($_POST)) {
					echo "value='" . htmlspecialchars($password) . "'";
				} ?>/>
			</div>
			<div class='col-xs-12 col-sm-12'>
				<label for='email'>E-Mail</label>
				<input type='text' id='email' name='email' <?php
				if (!empty($_POST)) {
					echo "value='" . htmlspecialchars($email) . "'";
				} ?>/>
			</div>
			<div class='col-xs-12 col-sm-12'>
				<input type='checkbox' id='toc' name='agb' <?php
						if (!empty($agb)) {
							echo " checked ";
						}
				 ?>/>
				<label for='toc'>Ich akzeptiere die AGB.</label>
			</div>
			<div class='col-xs-12'>
				<input type='submit' value='Registrieren' />
			</div>

				<?php
					// Fehlermeldungen ausgeben wenn es welche gibt
					if (!empty($validation_error)) {
						echo "<div class='col-xs-12'>";
						echo "<ul>";

						foreach ($validation_error as $value) {
							echo "<li>";
							echo $value;
							echo "</li>";
						}
						echo"</ul>";
						echo "</div>";
						echo "<div class='col-xs-12'>";
						echo "&nbsp;";
						echo "</div>";
					}
				 ?>

		</div>
	</div>
</form>

<?php
	// Abschluss-Klammer der Validierung wenn das Formular noch angezeigt werden soll.
}
 ?>
