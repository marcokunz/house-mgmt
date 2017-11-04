<?php
/**
 * Created by PhpStorm.
 * User: marcokunz
 * Date: 03.11.17
 * Time: 14:15
 */

use view\View;
require_once("config/Autoloader.php");

?>
<div class="container">
    <div class="page-header">
        <h2 class="text-center"><strong>Rechnungen</strong>.</h2></div>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Datum</th>
                <th>Typ</th>
                <th>Betrag</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php

            global $rechnungen;
            foreach($rechnungen as $rechnungen): ?>
                <tr>
                    <td><?php echo $rechnungen["datum"] ?></td>
                    <td><?php echo $rechnungen["typ"] ?> </td>
                    <td><?php echo $rechnungen["betrag"] ?> </td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <a class="btn btn-default" role="button" href="rechnungen/edit?id=<?php echo $rechnungen["id"] ?>"> <i class="fa fa-edit"></i></a>
                            <button class="btn btn-default" type="button" data-target="#confirm-modal" data-toggle="modal" data-href="mieter/delete?id=<?php echo $rechnungen["id"] ?>"> <i class="glyphicon glyphicon-trash"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>


            </tbody>
        </table>
    </div>
    <div class="btn-group" role="group">
        <a class="btn btn-default" role="button" href="rechnungen/create"> <i class="fa fa-plus-square-o"></i></a>
        <button class="btn btn-default" type="button"> <i class="fa fa-file-pdf-o"></i></button>
        <button class="btn btn-default" type="button"> <i class="fa fa-envelope-o"></i></button>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="confirm-modal">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title"><strong>Rechnungen</strong> löschen.</h4></div>
                <div class="modal-body">
                    <p>Wollen Sie die Rechnung löschen?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Cancel </button><a class="btn btn-primary" role="button" href="#">Delete </a></div>
            </div>
        </div>
    </div>
</div>