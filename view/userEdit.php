<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 21:48
 */
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WE-CRM</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/navigation.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
</head>

<body style="background-color:#609dd0;">
<div class="login-clean" style="background-color:#609dd0;">
    <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/register" method="post" style="background-color:#fbfbfb;color:rgba(120,159,205,0.2);">
        <h2 class="sr-only">Register Form</h2>
        <div class="illustration"><i class="glyphicon glyphicon-home" style="color:#149c82;"></i>
            <p style="font-size:19px;color:#1f2021;margin:-2px;margin-left:0px;margin-bottom:0px;margin-right:0px;margin-top:-25px;">HOUSE-MGMT </p>
        </div>
        <div class="form-group">
            <input required class="form-control" type="text" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <input required class="form-control" type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input required class="form-control" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Register / Update</button>
        </div>
    </form>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>

</html>
