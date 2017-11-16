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
require_once("config/Autoloader.php");
?>


<div class="container">
    <div class="page-header">
        <h2 class="text-center"><strong>Übersicht</strong>.</h2></div>
    <div class="header"><h3 class="text-center">Letzte Rechnungen</h3><\div>
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

            global $rechnung;
            foreach($rechnung as $rechnungen):
                ?>

                <tr>
                    <td><?php echo $rechnungen->getDatum(); ?></td>
                    <td><?php echo $rechnungen->getTyp(); ?> </td>
                    <td><?php echo $rechnungen->getBetrag(); ?> </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        <div class="header"><h3 class="text-center">Letzte Mieter</h3><\div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Vorname </th>
                        <th>Nachname </th>
                        <th>Adresse </th>
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
                            <td><?php echo $mietertabelle->getAdresse();?> </td>
                            <td><?php echo $mietertabelle->getMietzins();?> </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
</div>




