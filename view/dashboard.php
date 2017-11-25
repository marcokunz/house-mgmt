<?php
/**
 * Created by PhpStorm.
 * User: marcokunz
 * Date: 03.11.17
 * Time: 14:15
 */

use view\View;
use dao\RechnungenDAO;
use dao\MieterDAO;
use domain\Mieter;
use domain\Rechnungen;
use domain\Einnahme;
use dao\EinnahmeDAO;

require_once("config/Autoloader.php");
?>
<!DOCTYPE html>

<div class="container">
    <div class="page-header">
        <h2 class="text-center"><strong>Übersicht</strong>.</h2></div>
    <div class="overViewTable" onclick="location.href='rechnungen';">
    <div class="header"><h3 class="text-left">Rechnungen</h3></div>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Datum</th>
                <th>Typ</th>
                <th>Betrag</th>

            </tr>
            </thead>
            <tbody>
            <?php

            global $rechnung;
            foreach($rechnung as $rechnungen):?>
                <tr>
                    <td><?php echo $rechnungen->getDatum(); ?></td>
                    <td><?php echo $rechnungen->getTyp(); ?> </td>
                    <td><?php echo "CHF ".$rechnungen->getBetrag(); ?> </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
    <div class="overViewTable" onclick="location.href='mieter';">
    <div class="header"><h3 class="text-left">Mieter</h3></div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Vorname </th>
                        <th>Nachname </th>
                        <th>Quadratmeter</th>
                        <th>Mietzins </th>
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
                            <td><?php echo "CHF ".$mietertabelle->getMietzins();?> </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
    </div>
    <div class="overViewTable" onclick="location.href='einnahmen';">
    <div class="header"><h3 class="text-left">Einnahmen</h3></div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Mieter</th>
                <th>Datum</th>
                <th>Betrag</th>

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
                    <td><?php echo "CHF ".$einnahmen->getBetrag(); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>




