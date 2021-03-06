<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 21:28
 */
?>
<!DOCTYPE html>
<html>

<head>

    <!--//favicon-->
    <link rel="apple-touch-icon" sizes="180x180 " href="/view/assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/view/assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/view/assets/favicon-16x16.png">
    <link rel="manifest" href="/view/assets/manifest.json">
    <link rel="mask-icon" href="/view/assets/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOUSE-MGMT</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/navigation.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/animate.css">
</head>

<body class="login-clean">
<div class="login-clean">
    <form method="post">
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration"><i class="glyphicon glyphicon-home houseLogin"></i>
            <p class="titleLogin">HOUSE-MGMT </p>
        </div>
        <div class="form-group">
            <input required class="form-control" type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input required class="form-control" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Log In</button>
        </div><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/register" class="forgot">Register </a></form>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>


</body>


</html>
