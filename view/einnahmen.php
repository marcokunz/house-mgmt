<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 16:59
 */

use view\View;
use dao\EinnahmeDAO;
use domain\Einnahme;

require_once("config/Autoloader.php");
?>
<!DOCTYPE html>

<div class="container">
    <div class="page-header">
        <h2 class="text-center">erfasste <strong>Mieteinnahmen</strong>.</h2></div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Mieter ID </th>
                <th>Datum</th>
                <th>Betrag </th>
            </tr>
            </thead>
            <tbody>
            <?php

            global $einnahme;
            foreach($einnahme as $einnahmen): ?>
                <tr>
                    <td><?php echo $einnahmen->getMieterFk();?> </td>
                    <td><?php echo $einnahmen->getDatum();?> </td>
                    <td><?php echo $einnahmen->getBetrag();?> </td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <a class="btn btn-warning" role="button" href="einnahmen/edit?id=<?php echo $einnahmen->getId(); ?>"> <i class="fa fa-edit"></i></a>
                            <button class="btn btn-danger" type="button" data-target="#confirm-modal" data-toggle="modal" data-href="einnahmen/delete?id=<?php echo $einnahmen->getId(); ?>"> <i class="glyphicon glyphicon-trash"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="btn-group" role="group">
        <a class="btn btn-primary" role="button" href="einnahmen/create"> <i class="fa fa-plus-square-o"></i>  Mieteingang erfassen</a>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="confirm-modal">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title"><strong>Mieteingang</strong> löschen.</h4></div>
                <div class="modal-body">
                    <p>Wollen Sie den Mieteingang löschen?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Cancel </button><a class="btn btn-primary" role="button" href="#">Delete </a></div>
            </div>
        </div>
    </div>
</div>