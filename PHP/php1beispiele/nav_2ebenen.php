<?php

// alle navigationspunkte in einem array definieren
$nav_punkte = array(

	"home"      => array(
		"seitenname" => "Startseite"
	),

	"anfahrt"   => array(
		"seitenname" => "Der Weg zu mir",
		"subnav" => array(
			"produkt1" => "Kettensäge",
			"werkzeug" => "Werkzeugkiste",
			"hammer" => "Hammer und Amboss",
			"hammer22" => "asdfasdf"
		)
	),

	"galerie"   => array(
		"seitenname" => "Bilder",
		"subnav" => array(
			"asdf" => "asdfasdf",
			"e4werw" => "asdfasdf asd "
		)
	),

	"impressum" => array(
		"seitenname" => "Rechtliches"
	),

	"kontakt"   => array(
		"seitenname" => "Kontakt Formular"
	)
);

echo "<ul>";

foreach ($nav_punkte as $link_teil => $menupunkt) {
	echo "\n<li>";
	echo "<a";
	// überprüfen, ob hauptmenüpunkt der aktiven seite entspricht
	if ($seite == $link_teil) {
		echo " class='aktiv'";
	}
	// überprüfen, ob irgendein submenüpunkt aktiv ist
	if ( !empty($menupunkt["subnav"]) && array_key_exists($seite, $menupunkt["subnav"]) ) {
		echo " class='aktiv'";
	}

	echo " href='{$link_teil}'>{$menupunkt["seitenname"]}</a>";

	// submenü ausgeben, wenn existent
	if ( !empty($menupunkt["subnav"]) ) {
		echo "<ul>";
		foreach ($menupunkt["subnav"] as $sub_link_teil => $sub_menupunkt) {
			echo "<li>";
			echo "<a";
			if ($seite == $sub_link_teil) {
				echo " class='aktiv'";
			}
			echo " href='{$sub_link_teil}'>{$sub_menupunkt}</a>";
			echo "</li>";
		}
		echo "</ul>";
	}

	echo "</li>";
}

echo "</ul>";
?>

<!--
<ul>
	<li>
		<a href="index.php?seite=home">Startseite</a>
	</li>
	<li>
		<a href="index.php?seite=anfahrt">Der Weg zu mir</a>
		<ul>
			<li><a href="asdf">XYZ</a></li>
			<li><a href="nmk">Produkt B</a></li>
		</ul>
	</li>
</ul>

-->
