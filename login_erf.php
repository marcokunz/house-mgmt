<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title> Login Daten erfassen</title>
		<link rel="stylesheet" type="text/css" href="css.inc.css">
	<script type="text/javascript">
	function mySubmit() 
	{
	if(document.formular.benutzername.value == "") {
    alert("Bitte tragen Sie Ihren Benutzername (Kontaktperson) ein!");
    document.formular.benutzername.focus();
    return false;
    }
	if(document.formular.passwort1.value == "") {
    alert("Bitte geben sie ein Passwort ein!");
    document.formular.passwort1.focus();
    return false;
    }
	if(document.formular.passwort2.value == "") {
    alert("Bitte geben sie das Passwort zweimal ein - zur Kontrolle!");
    document.formular.passwort2.focus();
    return false;
    }
    if(document.formular.passwort1.value.length < 8) {
    alert("Bitte geben sie ein Passwort mit mindestens 8 Zeichen ein!")
    document.formular.passwort1.focus();
    return false;
    }
    var nr_length = document.formular.passwort1.value.replace(/[^0-9]/g, '').length;
    if(nr_length < 1){
    alert("Passwort muss mind. 1 Zahl haben !")
    document.formular.passwort1.focus();
    return false;
    }    
    if (document.formular.passwort1.value == document.formular.passwort2.value)
      { 
	  return true; 
	  }
	else
	  {  
	  alert("Passwörter sind nicht identisch");
	  return false; 
	  }
	}
    </script> 
    </head>
    <body>
<?php
// Session starten oder neu aufnehmen
session_start();

if (isset($_POST['erfassen']) OR isset($_POST['anpassen']))
{
		
  if (isset($_POST['email']) AND isset($_POST['passwort1']))
  {
  $vonwo = $_POST["vonwo"];
  $email = $_POST["email"];
  $benutzername = $_POST["benutzername"];
  $passwort1 = $_POST["passwort1"];
  $passwort2 = $_POST["passwort2"];
  $pass = md5($passwort1);

    if (($passwort1 == $passwort2) && (strlen($passwort1) >= 8))
    {
    // Datenbankverbindung
    include "db.inc.php";
	$link=mysqli_connect("localhost", $benutzer, $passwort) or die("Keine Verbindung zur Datenbank!");
    mysqli_select_db($link, $dbname) or die("Datenbank nicht gefunden!");

    // damit ä,ö,ü und é richtig dargestellt werden! --> auf utf8 stellen
    mysqli_query($link, "SET NAMES 'utf8'");
	
	// falls vom Formular anpassen 
    if ($vonwo == "anpassen")      
    { 
      $anpassung = "UPDATE users SET `password`='$pass', `user_name`='$benutzername' WHERE `email`='$email'";
      $angepasst = mysqli_query($link,$anpassung);
      if ($angepasst == TRUE)
	  {
	    echo "Die Daten wurden angepasst<br/>";
	    echo "Ihre Session_id ist:".session_id();
        echo "<br/> <a href=\"login_c.php\">Zu den geheimen Daten</a>";
	    echo "<br/> <a href=\"index.php\">Logout</a>";
	    $_SESSION['name']=$email;
        $_SESSION['eingeloggt']= true;
	  }
    } 
	
    // falls vom Formular "Neues Login" 
    if ($vonwo == "erfassung")
    {
    // prüfen ob email bereits vorhanden
    $abfrage="SELECT email FROM `users` WHERE email='$email'";
	$ergebnis=mysqli_query($link,$abfrage) or die("Abfrage hat nicht geklappt!");
	$count=mysqli_num_rows($ergebnis);
	
	if ($count == 1) 
	  { echo "<font>Diese E-Mail-Adresse wurde bereits erfasst!</font>";}
	else
	  {
	// Benutzer erfassen, weil noch nicht in DB vorhanden
	$insert="INSERT INTO users (`user_id`, `user_name`, `password`, `email`) VALUES('','$benutzername','$pass','$email')";
    mysqli_query($link,$insert)or die("DB-Eintrag hat nicht geklappt!");
	echo "<font>Daten wurden erfasst!!</font><br/>";
	  }
	}
    // Datenbankverbindung beenden
    mysqli_close($link);  	    
	} // end if passwörter gleich und länger als 8 Zeichen
	else
	{
			echo "Passwörter waren nicht identisch";
	} // end if passwörter gleich und länger als 8 Zeichen
  } // end if isset email, passwort1
}  // end if isset $submit
?>	
        <h1> Neue Login-Daten erfassen</h1>	
        <form name="formular" onsubmit="return mySubmit()" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
		  	<input type="hidden" name="vonwo" value="erfassung"/>	
			<input type="text" name="benutzername" value="" size="40" /> Benutzername<br/>
            <input type="text" name="email" value="" size="40" /> E-Mail-Adresse<br/>
            <input type="password" name="passwort1" value="" size="40" /> Passwort <br/>
			<input type="password" name="passwort2" value="" size="40" /> Passwort (Kontrolle)<br/>
            <input type="submit" name="erfassen" value="erfassen" />
			<input type="reset" value="nochmals" />
        </form><br/>
		
		<a href="login-reset-form.php">Passwort vergessen?</a><br/>
		<a href="index.php">Login</a><br/>
    </body>
</html>