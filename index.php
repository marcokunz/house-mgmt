<?php

require_once("config/Autoloader.php");
require_once("view/layout.php");

use router\Router;
use database\Database;
use dao\RechnungenDAO;
use dao\KostenDAO;

use domain\Rechnungen;
use dao\MieterDAO;
use domain\Mieter;
use dao\EinnahmeDAO;
use domain\Einnahme;
use dao\UserDAO;
use domain\User;

session_start();

$authFunction = function () {
    if (isset($_SESSION["userLogin"])) {
        return true;
    }
    Router::redirect("/login");
    return false;

};

$errorFunction = function () {
    Router::errorHeader();
    require_once("view/404.php");
};




// Login, Logout, Register

Router::route("GET", "/login", function () {
    require_once("view/userLogin.php");
});

Router::route("GET", "/register", function () {
    require_once("view/userEdit.php");
});



Router::route("POST", "/register", function () {
    $user = new User();
    $user->setName($_POST["name"]);
    $user->setEmail($_POST["email"]);
    $user->setPassword($_POST["password"]);
    $userDAO = new userDAO();
    $userDAO->create($user);
    Router::redirect("/logout");
});

Router::route("POST", "/login", function () {
    $user = new User();
    $user->setEmail($_POST["email"]);
    $user->setPassword($_POST["password"]);
    $userDAO = new UserDAO();
    $userDAO->readAll($user);
    Router::redirect("/");
});

Router::route("GET", "/logout", function () {
    session_destroy();
    Router::redirect("/login");
});




// Dashboard

Router::route_auth("GET", "/", $authFunction, function () {
    $mieterDAO = new MieterDAO();
    global $mieter;
    $mieter = $mieterDAO-> readAll();

    $rechnungenDAO = new RechnungenDAO();
    global $rechnung;
    $rechnung = $rechnungenDAO-> readAll();

    $einnahmenDAO = new EinnahmeDAO();
    global $einnahme;
    $einnahme = $einnahmenDAO->readAll();

    layoutSetContent("dashboard.php");
});

//Einnahmen

Router::route_auth("GET", "/einnahmen",$authFunction, function () {
    $einnahmeDAO = new EinnahmeDAO();
    global $einnahme;
    $einnahme = $einnahmeDAO->readAll();
    layoutSetContent("view/einnahmen.php");
});

Router::route_auth("GET", "/einnahmen/create", $authFunction, function () {
    $mieterDAO = new MieterDAO();
    global $mieter;
    $mieter = $mieterDAO-> readAll();
    layoutSetContent("einnahmenCreate.php");
});

Router::route_auth("POST", "/einnahmen/create", $authFunction, function () {
    $einnahme = new Einnahme();
    $einnahme->setMieterFk($_POST["mieterfk"]);
    $einnahme->setBetrag($_POST["betrag"]);
    $einnahme->setDatum($_POST["datum"]);
    $einnahmenDao = new EinnahmeDAO();
    $einnahmenDao->create($einnahme);

    Router::redirect("/einnahmen");
});

Router::route_auth("GET", "/einnahmen/edit", $authFunction, function () {
    $id = $_GET["id"];
    $einnahmenDAO = new EinnahmeDAO();
    global $einnahmen;
    $einnahmen = $einnahmenDAO->read($id);
    $mieterDAO = new MieterDAO();
    global $mieter;
    $mieter = $mieterDAO-> readAll();
    layoutSetContent("einnahmenEdit.php");
});

Router::route_auth("POST", "/einnahmen/edit", $authFunction, function () {
    $einnahme = new Einnahme();
    $einnahme->setId($_POST["id"]);
    $einnahme->setBetrag($_POST["betrag"]);
    $einnahme->setDatum($_POST["datum"]);
    $einnahme->setMieterFk($_POST["mieterfk"]);
    $einnahmeDAO = new EinnahmeDAO();
    $einnahmeDAO->update($einnahme);

    Router::redirect("/einnahmen");
});

Router::route_auth("GET", "/einnahmen/delete", $authFunction, function () {
    $id = $_GET["id"];
    $pdoInstance = Database::connect();
    $einnahmenDAO = new EinnahmeDAO();
    $einnahme = new Einnahme();
    $einnahme = $einnahmenDAO->read($id);
    $einnahmenDAO->delete($einnahme);

    Router::redirect("/einnahmen");
});



// Mieter

Router::route_auth("GET", "/mieter", $authFunction, function () {
    $mieterDAO = new MieterDAO();
    global $mieter;
    $mieter = $mieterDAO-> readAll();
    layoutSetContent("view/mieter.php");
});

// Mieterspiegel

Router::route_auth("GET", "/mieterspiegel", $authFunction, function () {
    $mieterDAO = new MieterDAO();
    global $mieter;
    $mieter = $mieterDAO-> readAll();
    require_once('view/mieterspiegelPDF.php');
});

Router::route_auth("GET", "/mieter/create", $authFunction, function () {
    layoutSetContent("mieterCreate.php");
});

Router::route_auth("POST", "/mieter/create", $authFunction, function () {
    $mieter = new Mieter();
    //$mieter->setId($_POST["id"]);
    $mieter->setVorname($_POST["vorname"]);
    $mieter->setNachname($_POST["nachname"]);
    $mieter->setQuadratmeter($_POST["quadratmeter"]);
    $mieter->setMietzins($_POST["mietzins"]);
    $mieterDAO = new MieterDAO();
    $mieterDAO->create($mieter);
    Router::redirect("/mieter");
});

Router::route_auth("GET", "/mieter/delete", $authFunction, function () {
    $id = $_GET["id"];
    $pdoInstance = Database::connect();
    $mieterDAO = new MieterDAO();
    $mieter = new Mieter();
    $mieter = $mieterDAO->read($id);
    $mieterDAO->delete($mieter);

    Router::redirect("/mieter");
});

Router::route_auth("GET", "/mieter/edit", $authFunction, function () {
    $id = $_GET["id"];
    $mieterDAO = new MieterDAO();
    global $mietertabelle;
    $mietertabelle = $mieterDAO->read($id);
    layoutSetContent("mieterEdit.php");
});

Router::route_auth("POST", "/mieter/edit", $authFunction, function () {
    $mieter = new Mieter();
    $mieter->setId($_POST["id"]);
    $mieter->setVorname($_POST["vorname"]);
    $mieter->setNachname($_POST["nachname"]);
    $mieter->setQuadratmeter($_POST["quadratmeter"]);
    $mieter->setMietzins($_POST["mietzins"]);
    $mieterDAO = new MieterDAO();
    $mieterDAO->update($mieter);

    Router::redirect("/mieter");
});



//Rechnungen


Router::route_auth("GET", "/rechnungen", $authFunction, function () {
    $rechnungenDAO = new RechnungenDAO();
    global $rechnung;
    $rechnung = $rechnungenDAO-> readAll();
    layoutSetContent("view/rechnungen.php");
});

Router::route_auth("POST", "/rechnungen/create", $authFunction, function () {
    $rechnung = new Rechnungen();
    $rechnung->setTyp($_POST["typ"]);
    $rechnung->setBetrag($_POST["betrag"]);
    $rechnung->setDatum($_POST["datum"]);
    $rechnungenDAO = new RechnungenDAO();
    $rechnungenDAO->create($rechnung);

    Router::redirect("/rechnungen");
});

Router::route_auth("GET", "/rechnungen/create", $authFunction, function () {
    layoutSetContent("rechnungenCreate.php");
});


Router::route_auth("GET", "/rechnungen/delete", $authFunction, function () {
    $id = $_GET["id"];
    $pdoInstance = Database::connect();
    $rechnungenDAO = new RechnungenDAO();
    $rechnungen = new Rechnungen();
    $rechnungen = $rechnungenDAO->read($id);
    $kostenDAO = new KostenDAO();
    $kostenDAO->deleteRechnung($rechnungen);
    $rechnungenDAO->delete($rechnungen);


    Router::redirect("/rechnungen");
});

Router::route_auth("GET", "/rechnungen/edit", $authFunction, function () {
    $id = $_GET["id"];
    $rechnungenDAO = new RechnungenDAO();
    global $rechnungen;
    $rechnungen = $rechnungenDAO->read($id);
    layoutSetContent("rechnungenEdit.php");
});

Router::route_auth("POST", "/rechnungen/edit", $authFunction, function () {
    $rechnung = new Rechnungen();
    $rechnung->setId($_POST["id"]);
    $rechnung->setTyp($_POST["typ"]);
    $rechnung->setBetrag($_POST["betrag"]);
    $rechnung->setDatum($_POST["datum"]);
    $rechnungenDAO = new RechnungenDAO();
    $rechnungenDAO->update($rechnung);


    Router::redirect("/rechnungen");
});



Router::route_auth("GET", "/abrechnungen", $authFunction, function () {
    $mieterDAO = new MieterDAO();
    global $mieter;
    $mieter = $mieterDAO-> readAll();

    /*$rechnungenDAO = new RechnungenDAO();
    global $rechnungen;
    $rechnungen = $rechnungenDAO-> readAll();*/

    $einnahmeDAO = new EinnahmeDAO();
    global $einnahme;
    $einnahme = $einnahmeDAO->readAll();

    layoutSetContent("view/abrechnungen.php");
});


Router::route_auth("GET", "/kostenabrechnung", $authFunction, function () {
    $mieterDAO = new MieterDAO();
    $einnahmenDAO = new EinnahmeDAO();
    $kostenDAO = new KostenDAO();
    global $mieter;
    global $einnahme;
    global $kosten;
    $mieter = $mieterDAO-> read($_GET["id"]);
    $einnahme = $einnahmenDAO->readAll();
    $kosten = $kostenDAO->readAll();

    require_once('view/abrechnungenPDF.php');
});








Router::call_route($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO'], $errorFunction);