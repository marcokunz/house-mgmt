<!doctype html>
<html lang="en">

<head>
    <title>Manipake | Nebenkosten </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="assets/vendor/jquery.bootgrid-1.3.1/jquery.bootgrid.min.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
<!-- WRAPPER -->
    <div id="wrapper">
        <?php include "navigationBar.php";?>
        <?php include "sideBar.php"; ?>
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h3 class="page-title">SQL-Data Test</h3>
                    <div class="panel panel-headline">
                        <?php
                       include "database.php";

                        // Create connection
                        $conn = new mysqli(localhost, $benutzer, $passwort, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT vorname, nachname, adresse, mietzins FROM Mieter";
                        $result = $conn->query($sql);
                        $numberOfRows = mysqli_num_fields($result);

                        echo "<table>";
                        echo "<thead>";
                        if ($result->num_rows > 0) {
                            echo "<tr align='left'>";
                            echo "<td>anpassen</td>";
                            for ($i=0; $i<$numberOfRows; $i++)
                            {$finfo = mysqli_fetch_field_direct($result, $i); echo "<th>".$finfo->name."</th>\n";
                            }echo "</tr>\n";
                            echo "</thead>";

                            echo "<tbody>";
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td align=\"left\">
                                                        <a class=\"btn btn-default\" data-target=\"#mieterEditierenModal\" data-toggle=\"modal\"><span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span></a>
                                                        <a class=\"btn btn-danger\" data-target=\"#mieterLöschenModal\" data-toggle=\"modal\"><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></a>
                                                    </td><td>".$row["vorname"]."</td><td>".$row["nachname"]."</td><td>".$row["adresse"]."</td><td>".$row["mietzins"]."</td></tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        ?>





                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->
    <div class="clearfix"></div>
    <footer>
        <div class="container-fluid">
            <p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
        </div>
    </footer>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/vendor/jquery.bootgrid-1.3.1/jquery.bootgrid.min.js"></script>
<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>