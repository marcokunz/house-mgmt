<?php
/**
 * Created by PhpStorm.
 * User: marcokunz
 * Date: 03.11.17
 * Time: 14:15
 */


use dao\MieterDAO;
use domain\Mieter;


require_once("config/Autoloader.php");
include "formatierung.php";
?>
<!DOCTYPE html>

<body>

<div class="container">
    <div class="page-header">
        <h2 class="text-center"><strong>Übersicht</strong>.</h2></div>
    <div class="overViewTable" onclick="location.href='rechnungen';" data-toggle="tooltip" title="zu den Rechnungen">
    <div class="header"><h3 class="text-left">Rechnungen</h3></div>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Datum</th>
                <th>Typ</th>
                <th class="alignTableRight">Betrag</th>

            </tr>
            </thead>
            <tbody>
            <?php

            global $rechnung;
            foreach($rechnung as $rechnungen):?>
                <tr>
                    <td><?php echo $rechnungen->getDatum(); ?></td>
                    <td><?php echo $rechnungen->getTyp(); ?> </td>
                    <td class="alignTableRight"><?php echo zahl_format($rechnungen->getBetrag()); ?> </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    </div>
    <div class="overViewTable" onclick="location.href='mieter';" data-toggle="tooltip" title="zu den Mietern">
    <div class="header"><h3 class="text-left">Mieter</h3></div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Vorname </th>
                        <th>Nachname </th>
                        <th>Quadratmeter</th>
                        <th class="alignTableRight">Mietzins </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    global $mieter;
                    foreach($mieter as $mietertabelle): ?>
                        <tr>
                        <tr>
                            <td><?php echo $mietertabelle->getVorname();?></td>
                            <td><?php echo $mietertabelle->getNachname();?> </td>
                            <td><?php echo $mietertabelle->getQuadratmeter()." m&#xB2";?> </td>

                            <td class="alignTableRight"><?php echo zahl_format($mietertabelle->getMietzins());?> </td>

                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
    </div>
    <div class="overViewTable" onclick="location.href='einnahmen';" data-toggle="tooltip" title="zu den Einnahmen">
    <div class="header"><h3 class="text-left">Einnahmen</h3></div>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Mieter</th>
                <th>Datum</th>
                <th class="alignTableRight">Betrag</th>

            </tr>
            </thead>
            <tbody>
            <?php

            global $einnahme;
            foreach($einnahme as $einnahmen):
                ?>

                <tr>
                    <td><?php
                        $mieterDAO = new MieterDAO();
                        $mieter = new Mieter();
                        $mieter = $mieterDAO->read($einnahmen->getMieterFk());
                        echo $mieter->getVorname()." ".$mieter->getNachname();
                        ?> </td>
                    <td><?php echo $einnahmen->getDatum(); ?></td>

                    <td class="alignTableRight"><?php echo zahl_format($einnahmen->getBetrag()); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>




