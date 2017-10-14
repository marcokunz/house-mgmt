<!doctype html>
<html lang="en">

<head>
	<title>Typography | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
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
        <?php include "NavBar.html";?>
        <?php include "leftSidebar.php"; ?>

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
                                                <!--<div class="col col-xs-6 text-right">
                                                    <div class="pull-right">
                                                        <div class="btn-group" data-toggle="buttons">
                                                            <label class="btn btn-success btn-filter active" data-target="completed">
                                                                <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                                                Completed
                                                            </label>
                                                            <label class="btn btn-warning btn-filter" data-target="pending">
                                                                <input type="radio" name="options" id="option2" autocomplete="off"> Pending
                                                            </label>
                                                            <label class="btn btn-default btn-filter" data-target="all">
                                                                <input type="radio" name="options" id="option3" autocomplete="off"> All
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>-->
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <table id="mytable" class="table table-striped table-bordered table-list">
                                                <thead>
                                                <tr>
                                                    <!--<th class="col-check"><input type="checkbox" id="checkall" onclick="test()"/></th>-->
                                                    <th class="col-tools"><span aria-hidden="true"></span>Anpassen</th>
                                                    <th class="hidden-xs">Vorname</th>
                                                    <th class="col-text">Nachname</th>
                                                    <th class="col-text">Mietobjekt</th>
                                                    <th class="col-text">Mietzins</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr data-status="completed">
                                                    <td align="left">
                                                        <a class="btn btn-default" data-target="#mieterEditierenModal" data-toggle="modal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                                        <a class="btn btn-danger" data-target="#mieterLöschenModal" data-toggle="modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                                    </td>
                                                    <td class="hidden-xs">Marco</td>
                                                    <td>Kunz</td>
                                                    <td>Wohnung 1</td>
                                                    <td>2000</td>
                                                </tr>

                                                </tbody>
                                            </table>

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
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
