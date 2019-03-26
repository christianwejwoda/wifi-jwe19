<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo htmlspecialchars($pagetitle); ?></title>
    <meta name"description" content="<?php echo htmlspecialchars($meta_discription); ?>" />

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/nav.css"/>
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/footer.css">

    <!-- About us css files -->
    <link rel="stylesheet" href="css/contact.css" type="text/css">
    <link rel="stylesheet" href="css/contact-form.css" type="text/css">
    <link rel="stylesheet" href="css/about_us.css" type="text/css">

    <!-- Team css files -->
    <link rel="stylesheet" href="css/team.css" type="text/css">

    <!-- Gallery css files -->
    <link rel="stylesheet" href="css/gallery.css" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">



</head>
<body>
<header>
    <div class="inner-wrapper">
        <div class="row">
            <div id="logo">
                <a href="home"><img src="img/Logo-placeholder.png" title="konditorei"/></a>
            </div>
            <?php
              // Navigation an dieser Stelle einbinden
              require "nav.php";
            ?>
        </div>
    </div>
</header>
