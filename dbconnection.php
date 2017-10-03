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