<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 17:06
 */
global $einnahmen;
use domain\Mieter;

?>
<div class="container">
    <div class="page-header">
        <h2 class="text-center"><strong>Mieteingang</strong> erfassen. </h2></div>
    <form action="create" method="post">
        <div class="form-group" style="display: none">
            <div class="input-group">
                <div class="input-group-addon"><span>ID </span></div>
                <input class="form-control" type="text" name="id"  value="<?php echo !empty($einnahmen["id"]) ? $einnahmen["id"] : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Betrag </span></div>
                <input class="form-control" required type="number" name="betrag" value="<?php echo !empty($einnahmen["betrag"]) ? $einnahmen["betrag"] : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Datum </span></div>
                <input class="form-control" required type="date" name="datum" value="<?php echo !empty($einnahmen["datum"]) ? $einnahmen["datum"] : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Mieter </span></div>
                <select class="form-control" required name="mieterfk">
                 <?php
                    global $mieter;
                    foreach($mieter as $mietertabelle): ?>
                    <option value="<?php echo $mietertabelle->getId();?>" <?php if ($myVar=="$mietertabelle->getId();") echo'selected="selected"';?>><?php echo $mietertabelle->getVorname()." ".$mietertabelle->getNachname();?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i></button>
            <button class="btn btn-danger" onclick="history.back()" type="submit"> <i class="fa fa-remove"></i></button>
        </div>
    </form>
</div>
