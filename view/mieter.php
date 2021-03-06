<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 16:59
 */


require_once("config/Autoloader.php");
include "formatierung.php";
?>
<!DOCTYPE html>

<div class="container">
    <div class="page-header">
        <h2 class="text-center">Unsere <strong>Mieter</strong>.</h2></div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Vorname </th>
                <th>Nachname </th>
                <th>Quadratmeter </th>
                <th>Mietzins </th>
            </tr>
            </thead>
            <tbody>
            <?php

            global $mieter;
            foreach($mieter as $mietertabelle): ?>
                <tr>
                    <td><?php echo $mietertabelle->getVorname();?></td>
                    <td><?php echo $mietertabelle->getNachname();?> </td>
                    <td><?php echo $mietertabelle->getQuadratmeter()." m&#xB2";?> </td>
                    <td><?php echo zahl_format($mietertabelle->getMietzins());?> </td>
                    <td align="right">
                        <div class="btn-group btn-group-sm" role="group">
                            <a class="btn btn-warning" role="button" href="mieter/edit?id=<?php echo $mietertabelle->getId(); ?>"> <i class="fa fa-edit"></i></a>
                            <button class="btn btn-danger" type="button" data-target="#confirm-modal" data-toggle="modal" data-href="mieter/delete?id=<?php echo $mietertabelle->getId(); ?>"> <i class="glyphicon glyphicon-trash"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="btn-group" role="group">
        <a class="btn btn-primary" role="button" href="mieter/create"> <i class="fa fa-plus-square-o"></i>  Mieter erfassen</a>
        <a target="_blank" class="btn btn-info" role="button" href="/mieterspiegel"> <i class="fa fa-file-pdf-o"></i>  Mieterspiegel</a>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="confirm-modal">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title"><strong>Mieter</strong> löschen.</h4></div>
                <div class="modal-body">
                    <p>Wollen Sie den Mieter löschen?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Cancel </button><a class="btn btn-primary" role="button" href="#">Delete </a></div>
            </div>
        </div>
    </div>
</div>