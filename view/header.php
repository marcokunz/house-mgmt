<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House-MGMT</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/navigation.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
</head>

<body>
<div>
    <nav class="navbar navbar-inverse navigation-clean.navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="<?php echo $GLOBALS["ROOT_URL"]; ?>">House-MGMT </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/mieter">Mieter</a></li>
                    <li role="presentation"><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/rechnungen">Rechnungen</a></li>
                    <li role="presentation"><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/abrechnungen">Abrechnungen</a></li>
                    <li role="presentation"><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/">Dashboard</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Profil<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/agent/edit">Profil editieren</a></li>
                            <li role="presentation"><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/mieterspiegel">Mieterspiegel</a></li>
                            <li role="presentation"><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/logout">Logout </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>