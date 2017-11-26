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
include formatierung.php;
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
<<<<<<< HEAD
                    <td align="right"><?php echo zahl_format($rechnungen->getBetrag()); ?> </td>
=======
                    <td class="alignTableRight"><?php echo "CHF ".$rechnungen->getBetrag(); ?> </td>
>>>>>>> c85ccc60c26fe1a907eaa7f62fb4315d9a84addb
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
<<<<<<< HEAD
                            <td align="right"><?php echo zahl_format($mietertabelle->getMietzins());?> </td>
=======
                            <td class="alignTableRight"><?php echo "CHF ".number_format($mietertabelle->getMietzins(),2, ".", "'");?> </td>
>>>>>>> c85ccc60c26fe1a907eaa7f62fb4315d9a84addb
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
<<<<<<< HEAD
                    <td align="right"><?php echo zahl_format($einnahmen->getBetrag()); ?></td>
=======
                    <td class="alignTableRight"><?php echo "CHF ".$einnahmen->getBetrag(); ?></td>
>>>>>>> c85ccc60c26fe1a907eaa7f62fb4315d9a84addb
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




