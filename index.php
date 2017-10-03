<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manipake House Management</title>
</head>
<body>
<h1>Manipake House Management</h1>

<?php

$dbname = "id3094629_housemgmtdb";
$benutzer = "id3094629_housemgmtdbuser";
$passwort = "yZJ-9nZ-PBT-TQH";


// Verbindung mit DB-Server aufbauen
$link=mysqli_connect("localhost", $benutzer, $passwort, $dbname);
mysqli_select_db($link, $dbname);



if(!$link) {
    echo "Not Conntected to DB...";
}

else {
    echo "Connection to DB established";
}



?>
/**
 * Created by PhpStorm.
 * User: marcokunz
 * Date: 30.09.17
 * Time: 13:29
 */
</body>
</html>