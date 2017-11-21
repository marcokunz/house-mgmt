<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 16:59
 */
use view\View;
use dao\MieterDAO;
use dao\KostenDAO;
use domain\Mieter;
require_once("config/Autoloader.php");

?>
<div class="container">
    <div class="page-header">
        <h2 class="text-center"><strong>Abrechnungen</strong> erstellen.</h2></div>

        <?php
    global $mieter;
        $counter = 0;
        $KostenDAO = new KostenDAO();
    foreach($mieter as $mietertabelle):



        if($counter%3==0):
            ?>
    <div class="row" style="margin:0px;padding:50px;">


    <?php endif; ?>

        <div class="col-md-4" style="background-color: transparent; padding: 10px; border-color: lightgrey; border-width: thin; border-style: solid; border-radius: 10px">
            <h4 class="text-left"><?php echo $mietertabelle->getVorname()." ".$mietertabelle->getNachname() ;?></h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Typ </th>
                        <th>Betrag </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Heizkosten</td>
                        <td><?php echo $KostenDAO->getTotalKosten($mietertabelle->getId(), "Heizkosten")?></td>
                    </tr>
                    <tr>
                        <td>Nebenkosten </td>
                        <td><?php echo $KostenDAO->getTotalKosten($mietertabelle->getId(), "Nebenkosten")?></td>
                    </tr>
                    <tr>
                        <td> <a target="_blank" class="btn btn-default" role="button" href="customer/pdf"> <i class="fa fa-file-pdf-o"></i></a></td>
                        <td> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php

        if($counter%3==2):
        ?>
    </div>
        <?php endif; ?>
        <?php $counter++;?>
    <?php endforeach; ?>
</div>