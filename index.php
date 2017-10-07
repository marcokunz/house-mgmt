<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manipake House Management</title>
</head>
<body>
<h1>Manipake House Management</h1>

<?php
include("dbconnection.php");
selectMieter();

?>

<h4>Login Fenster</h4>
<form action="login_pruef.php" method="post">
    <input type="text" name="benutzer" value="" /> Benutzer <br/>
    <input type="password" name="passwort" value="" /> Passwort <br/>
    <input type="submit" value="login" />
    <input type="reset" value="reset" />
</form>

</body>
</html>