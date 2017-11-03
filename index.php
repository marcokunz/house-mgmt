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
    /*$pdoInstance = Database::connect();
    $stmt = $pdoInstance->prepare('
            SELECT * FROM customer WHERE agentid = :agentId ORDER BY id;');
    $stmt->bindValue(':agentId', $_SESSION["agentLogin"]["id"]);
    $stmt->execute();
    global $customers;
    $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);*/
    layoutSetContent("dashboard.php");
});

Router::route_auth("GET", "/agent/edit", $authFunction, function () {
    require_once("view/userEdit.php");
});

Router::route_auth("GET", "/mieter", $authFunction, function () {
    layoutSetContent("view/mieter.php");
});

Router::route_auth("GET", "/rechnungen", $authFunction, function () {
    layoutSetContent("view/rechnungen.php");
});

Router::route_auth("GET", "/einnahmen", $authFunction, function () {
    layoutSetContent("view/einnahmen.php");
});

Router::route_auth("GET", "/dashboard", $authFunction, function () {
    layoutSetContent("view/dashboard.php");
});

Router::route_auth("GET", "/customer/create", $authFunction, function () {
    layoutSetContent("mieterEdit.php");
});

Router::route_auth("GET", "/customer/edit", $authFunction, function () {
    $id = $_GET["id"];
    $pdoInstance = Database::connect();
    $stmt = $pdoInstance->prepare('
            SELECT * FROM customer WHERE id = :id;');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    global $customer;
    $customer = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    layoutSetContent("mieterEdit.php");
});

Router::route_auth("GET", "/customer/delete", $authFunction, function () {
    $id = $_GET["id"];
    $pdoInstance = Database::connect();
    $stmt = $pdoInstance->prepare('
            DELETE FROM customer
            WHERE id = :id
        ');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    Router::redirect("/");
});

Router::route_auth("POST", "/customer/update", $authFunction, function () {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    if ($id === "") {
        $pdoInstance = Database::connect();
        $stmt = $pdoInstance->prepare('
            INSERT INTO customer (name, email, mobile, agentid)
            VALUES (:name, :email , :mobile, :agentid)');
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':mobile', $mobile);
        $stmt->bindValue(':agentid', $_SESSION["agentLogin"]["id"]);
        $stmt->execute();
    } else {
        $pdoInstance = Database::connect();
        $stmt = $pdoInstance->prepare('
            UPDATE customer SET name = :name,
                email = :email,
                mobile = :mobile
            WHERE id = :id');
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':mobile', $mobile);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    Router::redirect("/");
});

Router::call_route($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO'], $errorFunction);