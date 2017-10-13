<?PHP
session_start();


if (isset($_POST['email']) AND isset($_POST['passwort']))
{
    $email=$_POST['email'];
    $pass=$_POST['passwort'];
    $pass=md5($pass);

    // Datenbankverbindung
    include "db.inc.php";

    $link=mysqli_connect("localhost", $benutzer, $passwort) or die("Keine Verbindung zur Datenbank!");
    mysqli_select_db($link, $dbname) or die("Datenbank nicht gefunden!");

    // prüfen ob es user und passwort gibt
    $abfrage="SELECT username, password FROM `User` WHERE username='$email' and password='$pass'";
    $ergebnis=mysqli_query($link,$abfrage) or die("Email oder Passwort stimmt nicht!");
    $count=mysqli_num_rows($ergebnis);

    if ($count == 1)
    {
        $_SESSION['eingeloggt']=true;
        $_SESSION['email']=$email;
        echo "Herzlich willkommen im VIP-Bereich!<br/>";
        echo "Ihre Session-ID: ".session_id();
        echo "<br/><a href=\"login_c.php\"> Hier gehts zu den geheimen Daten</a>";
        echo "<br/><a href=\"login-anpassen-form.php\"> Passwort anpassen </a>";
    }
    else
    {
        $_SESSION['eingeloggt']=false;
        //header("Location:index.php");
        echo "Login nicht geklappt";
    }
}
?>
<html>
<head>
<title>Login-B - Passwort-Check</title>
<link rel="stylesheet" type="text/css" href="css.inc.css">
</head>
<body>



</body>
</html>