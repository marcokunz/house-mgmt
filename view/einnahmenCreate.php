<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 17:06
 */
global $einnahme;

?>
<div class="container">
    <div class="page-header">
        <h2 class="text-center"><strong>Mieteingang</strong> erfassen. </h2></div>
    <form action="create" method="post">
        <div class="form-group" style="display: none">
            <div class="input-group">
                <div class="input-group-addon"><span>ID </span></div>
                <input class="form-control" type="text" name="id"  value="<?php echo !empty($rechnungen["id"]) ? $rechnungen["id"] : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Betrag </span></div>
                <input class="form-control" required type="text" name="betrag" value="<?php echo !empty($rechnungen["betrag"]) ? $rechnungen["betrag"] : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Datum </span></div>
                <input class="form-control" required type="date" name="datum" value="<?php echo !empty($rechnungen["datum"]) ? $rechnungen["datum"] : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Mieter </span></div>
                <input class="form-control" required type="date" name="datum" value="<?php echo !empty($rechnungen["datum"]) ? $rechnungen["datum"] : ''; ?>">
            </div>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i></button>
        </div>
    </form>
</div>
