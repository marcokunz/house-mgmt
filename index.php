<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 12.09.2017
 * Time: 21:30
 */
require_once("config/Autoloader.php");
require_once("view/layout.php");

use router\Router;
use database\Database;
use dao\RechnungenDAO;
use domain\Rechnungen;
use dao\MieterDAO;

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

Router::route("GET", "/login", function () {
    require_once("view/userLogin.php");
});

Router::route("GET", "/register", function () {
    require_once("view/userEdit.php");
});



Router::route("POST", "/register", function () {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pdoInstance = Database::connect();
    $stmt = $pdoInstance->prepare('
        INSERT INTO "User" (name, email, password)
          SELECT :name,:email,:password
          WHERE NOT EXISTS (
            SELECT email FROM "User" WHERE email = :emailExist
        );');
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':emailExist', $email);
    $stmt->bindValue(':password', password_hash($_POST["password"], PASSWORD_DEFAULT));
    $stmt->execute();
    Router::redirect("/logout");
});

Router::route("POST", "/login", function () {
    $email = $_POST["email"];
    $pdoInstance = Database::connect();
    $stmt = $pdoInstance->prepare('
            SELECT * FROM "User" WHERE email = :email');
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        if (password_verify($_POST["password"], $user["password"])) {
            $_SESSION["userLogin"]["name"] = $user["name"];
            $_SESSION["userLogin"]["email"] = $email;
            $_SESSION["userLogin"]["id"] = $user["id"];
            if (password_needs_rehash($user["password"], PASSWORD_DEFAULT)) {
                $stmt = $pdoInstance->prepare('
                UPDATE "User" SET password=:password WHERE id = :id;');
                $stmt->bindValue(':id', $user["id"]);
                $stmt->bindValue(':password', password_hash($_POST["password"], PASSWORD_DEFAULT));
                $stmt->execute();
            }
        }
    }
    Router::redirect("/");
});

Router::route("GET", "/logout", function () {
    session_destroy();
    Router::redirect("/login");
});

Router::route_auth("GET", "/", $authFunction, function () {
    $pdoInstance = Database::connect();
    $stmt = $pdoInstance->prepare('
            SELECT * FROM mieter');
    $stmt->execute();
    global $customers;
    $customers = $stmt->fetchAll(PDO::FETCH_COLUMN, "2");
    layoutSetContent("dashboard.php");
});

Router::route_auth("GET", "/agent/edit", $authFunction, function () {
    require_once("view/userEdit.php");
});

Router::route_auth("GET", "/mieter", $authFunction, function () {
    layoutSetContent("view/mieter.php");
});

Router::route_auth("GET", "/rechnungen", $authFunction, function () {
    $rechnungenDAO = new RechnungenDAO();
    global $rechnung;
    $rechnung = $rechnungenDAO-> readAll();
    layoutSetContent("view/rechnungen.php");
});

Router::route_auth("POST", "/rechnungen/update", $authFunction, function () {
    $rechnung = new Rechnungen();
    $rechnung->setId($_POST["id"]);
    $rechnung->setTyp($_POST["typ"]);
    $rechnung->setBetrag($_POST["betrag"]);
    $rechnung->setDatum($_POST["datum"]);
    $rechnungenDAO = new RechnungenDAO();
    $rechnungenDAO->create($rechnung);


    Router::redirect("/rechnungen");
});

Router::route_auth("GET", "/rechnungen/delete", $authFunction, function () {
    $id = $_GET["id"];
    $pdoInstance = Database::connect();
    $stmt = $pdoInstance->prepare('
            DELETE FROM rechnungen
            WHERE id = :id
        ');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    Router::redirect("/rechnungen");
});

Router::route_auth("GET", "/einnahmen", $authFunction, function () {
    layoutSetContent("view/einnahmen.php");
});

Router::route_auth("GET", "/mieter/create", $authFunction, function () {
    layoutSetContent("mieterEdit.php");
});

Router::route_auth("GET", "/rechnungen/create", $authFunction, function () {
    layoutSetContent("rechnungenEdit.php");
});





Router::route_auth("GET", "/mieter/edit", $authFunction, function () {
    $id = $_GET["id"];
    $pdoInstance = Database::connect();
    $stmt = $pdoInstance->prepare('
            SELECT * FROM mieter WHERE id = :id;');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    global $mieter;
    $mieter = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    layoutSetContent("mieterEdit.php");
});

Router::route_auth("GET", "/mieter/delete", $authFunction, function () {
    $id = $_GET["id"];
    $pdoInstance = Database::connect();
    $stmt = $pdoInstance->prepare('
            DELETE FROM mieter
            WHERE id = :id
        ');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    Router::redirect("/mieter");
});

Router::route_auth("POST", "/mieter/update", $authFunction, function () {


    /*$id = $_POST["id"];
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $adresse = $_POST ["adresse"];
    $mietzins = $_POST["mietzins"];
    if ($id === "") {
        $pdoInstance = Database::connect();
        $stmt = $pdoInstance->prepare('
            INSERT INTO mieter (vorname, nachname, adresse, mietzins)
            VALUES (:vorname, :nachname , :adresse, :mietzins)');
        $stmt->bindValue(':vorname', $vorname);
        $stmt->bindValue(':nachname', $nachname);
        $stmt->bindValue(':adresse', $adresse);
        $stmt->bindValue(':mietzins', $mietzins);
        $stmt->execute();
    } else {
        $pdoInstance = Database::connect();
        $stmt = $pdoInstance->prepare('
            UPDATE mieter SET 
                vorname = :vorname,
                nachname = :nachname,
                adresse = :adresse,
                mietzins = :mietzins
            WHERE id = :id');
        $stmt->bindValue(':vorname', $vorname);
        $stmt->bindValue(':nachname', $nachname);
        $stmt->bindValue(':adresse', $adresse);
        $stmt->bindValue(':mietzins', $mietzins);
        $stmt->execute();
    }*/
    Router::redirect("/mieter");
});

Router::call_route($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO'], $errorFunction);