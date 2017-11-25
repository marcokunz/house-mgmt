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
                <input class="form-control" required type="text" name="vorname" value="<?php echo !empty($mietertabelle["vorname"]) ? $mietertabelle["vorname"] : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Nachname </span></div>
                <input class="form-control" required type="text" name="nachname" value="<?php echo !empty($mietertabelle["nachname"]) ? $mietertabelle["nachname"] : ''; ?>">
            </div>
        </div>
        <!--
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Quadratmeter </span></div>
                <input class="form-control" required type="number" name="quadratmeter" value="<?// php echo !empty($mietertabelle["quadratmeter"]) ? $mietertabelle["quadratmeter"] : ''; ?>">
            </div>
        </div>
        -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Quadratmeter </span></div>
                <select class="form-control" required name="Mietzins">
                    <option value="">Bitte Quadratmeter eingeben</option>
                    <option value="100">100 m2</option>
                    <option value="200">200 m2</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Mietzins </span></div>
                <input class="form-control" required type="number" name="mietzins" value="<?php echo !empty($mietertabelle["mietzins"]) ? $mietertabelle["mietzins"] : ''; ?>">
            </div>
        </div>


        <div class="btn-group" role="group">
            <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i></button>
            <button class="btn btn-danger" onclick="history.back()" type="submit"> <i class="fa fa-remove"></i></button>
        </div>
    </form>
</div>
