<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 17:06
 */
global $mietertabelle;

?>
<div class="container">
    <div class="page-header">
        <h2 class="text-center"><strong>Mieter</strong> erfassen. </h2></div>
    <form action="create" method="post">
        <div class="form-group" style="display: none">
            <div class="input-group">
                <div class="input-group-addon"><span>ID </span></div>
                <input class="form-control" type="hidden" name="id" value="<?php echo !empty($mietertabelle["id"]) ? $mietertabelle["id"] : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Vorname </span></div>
                <input class="form-control" type="text" name="vorname" value="<?php echo !empty($mietertabelle["vorname"]) ? $mietertabelle["vorname"] : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Nachname </span></div>
                <input class="form-control" type="text" name="nachname" value="<?php echo !empty($mietertabelle["nachname"]) ? $mietertabelle["nachname"] : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Quadratmeter </span></div>
                <select class="form-control" name="typ">
                    <option value="100" <?php if ($myVar=="100") echo'selected="selected"';?>>Wohnung 1 - 100qm</option>
                    <option value="130" <?php if ($myVar=="130") echo'selected="selected"';?>>Wohnung 2 - 130qm</option>
                    <option value="80" <?php if ($myVar=="80") echo'selected="selected"';?>>Wohnung 3 - 80qm</option>
                    <option value="50" <?php if ($myVar=="50") echo'selected="selected"';?>>Wohnung 4 - 50qm</option>
                    <option value="110" <?php if ($myVar=="110") echo'selected="selected"';?>>Wohnung 5 - 110qm</option>
                    <option value="250" <?php if ($myVar=="250") echo'selected="selected"';?>>Wohnung 6 - 250qm</option>
                    <option value="75" <?php if ($myVar=="75") echo'selected="selected"';?>>Wohnung 7 - 75m</option>
                    <option value="85" <?php if ($myVar=="85") echo'selected="selected"';?>>Wohnung 8 - 85qm</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Mietzins </span></div>
                <input class="form-control" type="text" name="mietzins" value="<?php echo !empty($mietertabelle["mietzins"]) ? $mietertabelle["mietzins"] : ''; ?>">
            </div>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-default" type="submit"> <i class="fa fa-save"></i></button>
        </div>
    </form>
</div>
