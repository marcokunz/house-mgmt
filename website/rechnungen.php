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
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="main_page.php"><img src="" alt="ManiHacke Logo" class="img-responsive logo"></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>


                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span>Cedi</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="main_page.php" class="active"><i class="lnr lnr-map"></i> <span>Übersicht</span></a></li>
                                <li><a href="rechnungen.php" class=""><i class="lnr lnr-file-empty"></i> <span>Rechnungen</span></a></li>
                                <li><a href="mieter.php" class=""><i class="lnr lnr-home"></i> <span>Mieter</span></a></li>
                                <li><a href="nebenkosten.php" class=""><i class="lnr lnr-database"></i> <span>Nebenkosten abrechnen</span></a></li>
                                <li><a href="index.php" class=""><i class="lnr lnr-lock"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                        <!-- <li>
                            <a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="main_page.php" class=""><i class="lnr lnr-map"></i> <span>Übersicht</span></a></li>
                        <li><a href="rechnungen.php" class="active"><i class="lnr lnr-file-empty"></i> <span>Rechnungen</span></a></li>
                        <li><a href="mieter.php" class=""><i class="lnr lnr-home"></i> <span>Mieter</span></a></li>
                        <li><a href="nebenkosten.php" class=""><i class="lnr lnr-database"></i> <span>Nebenkosten abrechnen</span></a></li>
                        <li><a href="index.php" class=""><i class="lnr lnr-lock"></i> <span>Logout</span></a></li>


                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="container-fluid">
                        <div class="panel-body">
                            <!--<h1>Mieter-Panel</h1>-->
                            <!-- bootstrap table panel https://bootsnipp.com/snippets/ORE6d#comments -->
                            <!--<div class="container">
                                <!--<div class="row">
                                    <!--<nav class="navbar navbar-default">
                                        <div class="container">
                                            <div class="navbar-header">
                                                <span class="navbar-brand"></span>
                                            </div>

                                        </div>
                                    </nav>
                                </div>-->
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-default panel-table">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col col-xs-6">
                                                    <h3 class="panel-title">Rechnungen Panel</h3>
                                                </div>
                                                <div class="col col-xs-6 text-right">
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <table id="mytable" class="table table-striped table-bordered table-list">
                                                <thead>
                                                <tr>
                                                    <!--<th class="col-check"><input type="checkbox" id="checkall" onclick="test()"/></th>-->
                                                    <th class="col-tools"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                                    </th>
                                                    <th class="hidden-xs">ID</th>
                                                    <th class="col-text">Name</th>
                                                    <th class="col-text">Email</th>
                                                    <th class="col-text">Cedi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr data-status="completed">
                                                    <td align="center"><input type="checkbox" class="checkthis"/></td>
                                                    <td align="center">
                                                        <a class="btn btn-default"><span class="glyphicon glyphicon-pencil"
                                                                                         aria-hidden="true"></span></a>
                                                        <a class="btn btn-danger"><span class="glyphicon glyphicon-trash"
                                                                                        aria-hidden="true"></span></a>
                                                    </td>
                                                    <td class="hidden-xs">1</td>
                                                    <td>John Doe</td>
                                                    <td>johndoe@example.com</td>
                                                </tr>
                                                <tr data-status="pending">
                                                    <td align="center"><input type="checkbox" class="checkthis"/></td>
                                                    <td align="center">
                                                        <a class="btn btn-default"><span class="glyphicon glyphicon-pencil"
                                                                                         aria-hidden="true"></span></a>
                                                        <a class="btn btn-danger"><span class="glyphicon glyphicon-trash"
                                                                                        aria-hidden="true"></span></a>
                                                    </td>
                                                    <td class="hidden-xs">2</td>
                                                    <td>Jen Curtis</td>
                                                    <td>jencurtis@example.com</td>
                                                </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col col-xs-offset-3 col-xs-6">
                                                    <nav aria-label="Page navigation" class="text-center">
                                                        <ul class="pagination">
                                                            <li>
                                                                <a href="#" aria-label="Previous">
                                                                    <span aria-hidden="true">«</span>
                                                                </a>
                                                            </li>
                                                            <li class="active"><a href="#">1</a></li>
                                                            <li><a href="#">2</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li><a href="#">4</a></li>
                                                            <li><a href="#">5</a></li>
                                                            <li>
                                                                <a href="#" aria-label="Next">
                                                                    <span aria-hidden="true">»</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                                <div class="col col-xs-3">
                                                    <div class="pull-right">
                                                        <button type="button" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-plus"
                                          aria-hidden="true"></span>
                                                            Eintrag hinzufügen
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--<nav class="navbar navbar-default">
                                    <div class="container-fluid">
                                        <p class="navbar-text">A simple example of how-to put a bordered table within a panel. Responsive, place
                                            holders in header/footer
                                            for buttons or pagination.</p>
                                    </div>
                                </nav>-->
                            </div>
                        </div>

                        <!-- end bootstrap table panel https://bootsnipp.com/snippets/ORE6d#comments -->
                        <!-- INPUTS to create a new invoice (popup window) -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Rechnungen erfassen</h3>
                            </div>
                            <div class="panel-body">
                                <input type="text" class="form-control" placeholder="text field">
                                <br>
                                <input type="password" class="form-control" value="asecret">
                                <br>
                                <textarea class="form-control" placeholder="textarea" rows="4"></textarea>
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
                                <label class="fancy-checkbox">
                                    <input type="checkbox">
                                    <span>Fancy Checkbox 1</span>
                                </label>
                                <label class="fancy-checkbox">
                                    <input type="checkbox">
                                    <span>Fancy Checkbox 2</span>
                                </label>
                                <label class="fancy-checkbox">
                                    <input type="checkbox">
                                    <span>Fancy Checkbox 3</span>
                                </label>
                                <br>
                                <label class="fancy-radio">
                                    <input name="gender" value="male" type="radio">
                                    <span><i></i>Male</span>
                                </label>
                                <label class="fancy-radio">
                                    <input name="gender" value="female" type="radio">
                                    <span><i></i>Female</span>
                                </label>
                            </div>
                        </div>
                        <!-- END INPUTS -->
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
	<script src="assets/scripts/klorofil-common.js"></script>
    <script>
        $(document).ready(function () {
            $('.btn-filter').on('click', function () {
                var $target = $(this).data('target');
                if ($target != 'all') {
                    $('.table tbody tr').css('display', 'none');
                    $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
                } else {
                    $('.table tbody tr').css('display', 'none').fadeIn('slow');
                }
            });

            $('#checkall').on('click', function () {
                if ($("#mytable #checkall").is(':checked')) {
                    $("#mytable input[type=checkbox]").each(function () {
                        $(this).prop("checked", true);
                    });

                } else {
                    $("#mytable input[type=checkbox]").each(function () {
                        $(this).prop("checked", false);
                    });
                }
            });
        });
    </script>

</body>

</html>
