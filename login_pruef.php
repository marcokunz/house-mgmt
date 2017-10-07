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
    $res = mysqli_query($link,"select* from User");
    echo "<table>";
    echo "<tr><th>userID</th>";
    echo "<th>Username</th>";
    echo "<th>Password</th></tr>";
    while ($datensatz=mysqli_fetch_assoc($res)) {
        echo "<tr><td>".$datensatz["user_id"]."</td>";
        echo "<td>".$datensatz["username"]."</td>";
        echo "<td>".$datensatz["password"]."</td></tr>";
    }
    echo "</table>";
}


