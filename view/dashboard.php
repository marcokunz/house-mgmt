<?php
/**
 * Created by PhpStorm.
 * User: marcokunz
 * Date: 03.11.17
 * Time: 15:09.
**/

use dao\RechnungenDAO;
use domain\Rechnungen;

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
