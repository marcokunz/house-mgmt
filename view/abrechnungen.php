<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 16:59
 */
use view\View;
use dao\MieterDAO;
use domain\Mieter;
require_once("config/Autoloader.php");

?>
<div class="container">
    <div class="page-header">
        <h2 class="text-center"><strong>Abrechnungen</strong> erstellen.</h2></div>

        <?php
    global $mieter;
        $counter = 0;
    foreach($mieter as $mietertabelle): ?>

        <?php

        if($counter%3==0):
            ?>
    <div class="row" style="margin:0px;padding:50px;">


    <?php endif; ?>

        <div class="col-md-4" style="background-color:rgb(248,248,248);margin-right:5px;">
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
                        <td>Heizkosten </td>
                        <td>Cell 2</td>
                    </tr>
                    <tr>
                        <td>Nebenkosten </td>
                        <td>Cell 4</td>
                    </tr>
                    <tr>
                        <td> <i class="glyphicon glyphicon-file" style="font-size:20px;"></i> </td>
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