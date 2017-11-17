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
        <h2 class="text-center"><strong>Mieter</strong> editieren. </h2></div>
    <form action="edit" method="post">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>ID </span></div>
                <input class="form-control" type="text" name="id"  readonly ="" value="<?php echo isset($mietertabelle) ? ($mietertabelle->getId()) : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Vorname </span></div>
                <input class="form-control" type="text" name="name" value="<?php echo isset($mietertabelle) ? ($mietertabelle->getVorname()) : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Nachname </span></div>
                <input class="form-control" type="text" name="nachname" value="<?php echo isset($mietertabelle) ? ($mietertabelle->getNachname()) : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Adresse </span></div>
                <input class="form-control" type="text" name="adresse" value="<?php echo isset($mietertabelle) ? ($mietertabelle->getAdresse()) : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Mietzins </span></div>
                <input class="form-control" type="text" name="mietzins" value="<?php echo isset($mietertabelle) ? ($mietertabelle->getMietzins()): ''; ?>">
            </div>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-default" type="submit"> <i class="fa fa-save"></i></button>
        </div>
    </form>
</div>
