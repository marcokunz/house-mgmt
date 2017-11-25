<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 16:59
 */

use view\View;
use dao\EinnahmeDAO;
use domain\Einnahme;
use dao\MieterDAO;
use domain\Mieter;

?>
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
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" sizes="16x16">
</head>

<body>
<div>
    <nav class="navbar navbar-inverse navigation-clean.navbar-inverse">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="<?php echo $GLOBALS["ROOT_URL"]; ?>">House-MGMT </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/mieter">Mieter</a></li>

                    <?php
                    $mieterDAO = new MieterDAO();
                    $check = $mieterDAO->readAll();

                    if (!empty($check)){
                        echo" 
                        <li role=\"presentation\"><a href=".$GLOBALS["ROOT_URL"]."/rechnungen>Rechnungen</a></li> 
                        <li role=\"presentation\"><a href=".$GLOBALS["ROOT_URL"]."/einnahmen>Einnahmen</a></li>
                        <li role=\"presentation\"><a href=".$GLOBALS["ROOT_URL"]."/abrechnungen>Abrechnungen</a></li>";
                    }
                    ?>
                    <li role="presentation"><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/">Dashboard</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Profil<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/register">Profil editieren</a></li>
                            <li role="presentation"><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/mieterspiegel">Mieterspiegel</a></li>
                            <li role="presentation"><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/logout">Logout </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>