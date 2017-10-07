<?php
function selectMieter(){
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
    $res = mysqli_query($link,"select* from Mieter");
    echo "<table>";
    while ($datensatz=mysqli_fetch_assoc($res)) {
        echo "<tr><td>".$datensatz["vorname"]."</td>";
        echo "<td>".$datensatz["nachname"]."</td>";
        echo "<td>".$datensatz["adresse"]."</td>";
        echo "<td>".$datensatz["mietzins"]."</td></tr>";
    }
    echo "</table>";
}



}

?>