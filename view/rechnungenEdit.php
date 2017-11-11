<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 17:06
 */
global $rechnungen;

?>
<div class="container">
    <div class="page-header">
        <h2 class="text-center"><strong>Rechnung</strong> editieren. </h2></div>
    <form action="update" method="post">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>ID </span></div>
                <input class="form-control" type="text" name="id" readonly="" value="<?php echo isset($this->rechnungen) ? $this->rechnungen->getId() : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Typ </span></div>
                <input class="form-control" type="text" name="typ" value="<?php echo isset($this->rechnungen) ? View::noHTML($this->rechnungen->getTyp()) : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Betrag </span></div>
                <input class="form-control" type="text" name="betrag" value="<?php echo isset($this->rechnungen) ? View::noHTML($this->rechnungen->getBetrag()) : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Datum </span></div>
                <input class="form-control" type="text" name="datum" value="<?php echo isset($this->rechnungen) ? View::noHTML($this->rechnungen->getDatum()) : ''; ?>">
            </div>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-default" type="submit"> <i class="fa fa-save"></i></button>
        </div>
    </form>
</div>
