		<div id='journal'>
			<div class='wrapper'>
					<div class='row'>
						<div class='col-xs-12'>
								<h1>Zufallspasswort</h1>
						</div>
					</div>

					<div class='row'>
						<div class='col-xs-12'>
							<?php
								include "inhalte/generate_password.php";
								for ($i=0; $i < 10; $i++) {
								$pw = generate_password();
								echo $i . ": " . htmlspecialchars( $pw ) . " - Länge: " . mb_strlen( $pw );
								echo "<br>";
							}
							 ?>
						</div>
					</div>

			</div>
		</div>
