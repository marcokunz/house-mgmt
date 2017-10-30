<!doctype html>
<html lang="en">

<head>
	<title>Manipake | Mieter</title>
    <?php include "headAll.php";?>
    <?php include "database.php";?>
    <?php
    // Create connection
    $conn = new mysqli(localhost, $benutzer, $passwort, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT vorname, nachname, adresse, mietzins FROM Mieter";
    $result = $conn->query($sql);
    $numberOfRows = mysqli_num_fields($result);
    ?>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
        <?php include "navigationBar.php";?>
        <?php include "sideBar.php"; ?>

		<!-- MAIN -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="container-fluid">
                        <div class="panel-body">
                            <!--<h1>Mieter-Panel</h1>-->
                            <!-- bootstrap table panel https://bootsnipp.com/snippets/ORE6d#comments -->
                            <div class="row">
                                <div class="col-md-0 col-md-offset-0">
                                    <div class="panel panel-default panel-table">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col col-xs-6">
                                                    <h3 class="panel-title">Mieter Übersicht</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">


                                                <table id="mytable" class="table table-striped table-bordered table-list">
                                                    <?php
                                                    echo "<thead>";
                                                    if ($result->num_rows > 0) {
                                                    echo "<tr align='left'>";
                                                        echo "<th>anpassen</th>";
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
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col col-xs-offset-3 col-xs-6">
                                                    <nav aria-label="Page navigation" class="text-center">
                                                    </nav>
                                                </div>
                                                <div class="col col-xs-3">
                                                    <div class="pull-right">
                                                        <button type="button" class="btn btn-primary" data-target="#mieterErfassenModal" data-toggle="modal"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Eintrag hinzufügen</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- end bootstrap table panel https://bootsnipp.com/snippets/ORE6d#comments -->


                        <!-- Boostrap modal - Creating a new "Mieter" -->
                        <div class="modal" id="mieterErfassenModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Mieter erfassen</h3>
                                    </div>
                                    <div class="panel-body">
                                        <input type="text" class="form-control" placeholder="Vorname">
                                        <br>
                                        <input type="text" class="form-control" placeholder="Nachname">
                                        <br>
                                        <input type="text" class="form-control" placeholder="Mietzins">
                                        <br>
                                        <select class="form-control">
                                            <option value="cheese">Cheese</option>
                                            <option value="tomatoes">Tomatoes</option>
                                            <option value="mozarella">Mozzarella</option>
                                            <option value="mushrooms">Mushrooms</option>
                                            <option value="pepperoni">Pepperoni</option>
                                            <option value="onions">Onions</option>
                                        </select>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-success"><i class="fa fa-check-circle"></i> Hinzufügen</button>
                                            </div>
                                            <div class="col-md-6" class="close">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-warning"></i>Abbrechen</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Boostrap modal - Creating a new "Mieter" -->

                        <!-- Boostrap modal - Editing a "Mieter" -->
                        <div class="modal" id="mieterEditierenModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Mieter editieren</h3>
                                    </div>
                                    <div class="panel-body">
                                        <input type="text" class="form-control" placeholder="Vorname">
                                        <br>
                                        <input type="text" class="form-control" placeholder="Nachname">
                                        <br>
                                        <input type="text" class="form-control" placeholder="Mietzins">
                                        <br>
                                        <select class="form-control">
                                            <option value="cheese">Cheese</option>
                                            <option value="tomatoes">Tomatoes</option>
                                            <option value="mozarella">Mozzarella</option>
                                            <option value="mushrooms">Mushrooms</option>
                                            <option value="pepperoni">Pepperoni</option>
                                            <option value="onions">Onions</option>
                                        </select>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-success"><i class="fa fa-check-circle"></i> Hinzufügen</button>
                                            </div>
                                            <div class="col-md-6" class="close">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-warning"></i>Abbrechen</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Boostrap modal - Editing a "Mieter" -->

                        <!-- Boostrap modal - Deleting a "Mieter" -->
                        <div class="modal" id="mieterLöschenModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h3 class="modal-title">Mieter löschen</h3>
                                    </div>
                                    <div class="modal-body">
                                    <p>Wollen Sie den Mieter wirklich löschen?</p>
                                    <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-danger"><i class="fa fa-check-circle"></i>Löschen</button>
                                            </div>
                                            <div class="col-md-6" class="close">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-warning"></i>Abbrechen</button>
                                            </div>
                                        </div>


                                </div>
                            </div>
                        </div>
                        <!-- Boostrap modal - Deleting a "Mieter" -->


                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->

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
