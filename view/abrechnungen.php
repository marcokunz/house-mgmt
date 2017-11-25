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
use domain\Einnahme;
use dao\EinnahmeDAO;

require_once("config/Autoloader.php");

?>
<body>
<div class="container">
    <div class="page-header">
        <h2 class="text-center"><strong>Abrechnungen</strong> erstellen.</h2></div>

        <?php
    global $mieter;
    global $einnahme;
        $counter = 0;
        $KostenDAO = new KostenDAO();
        $einnahmeDAO = new EinnahmeDAO();
    foreach($mieter as $mietertabelle):



        if($counter%3==0):
            ?>
    <div class="row" style="margin:0px;padding:0px;">


    <?php endif; ?>

        <div class="col-md-4 abrechnungen" data-toggle="tooltip" title="Abrechnung erstellen" onclick="location.href='/kostenabrechnung?id=<?php echo $mietertabelle->getId(); ?>';">
            <h4 class="text-left"><strong><?php echo $mietertabelle->getVorname()." ".$mietertabelle->getNachname() ;?></strong></h4>
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
                        <td><?php
                            if($KostenDAO->getTotalKosten($mietertabelle->getId(), "Heizkosten")==null){
                                echo "CHF 0";
                            }
                            else{
                            echo "CHF ".$KostenDAO->getTotalKosten($mietertabelle->getId(), "Heizkosten");
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Nebenkosten </td>
                        <td><?php
                            if($KostenDAO->getTotalKosten($mietertabelle->getId(), "Nebenkosten")==null){
                                echo "CHF 0";
                            }
                            else{
                                echo "CHF ".$KostenDAO->getTotalKosten($mietertabelle->getId(), "Nebenkosten");
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Mieteingänge </td>
                        <td><?php
                            if($einnahmeDAO->getTotalEinnahmen($mietertabelle->getId())==null){
                                echo "CHF 0";
                            }
                            else {
                                echo "CHF " . $einnahmeDAO->getTotalEinnahmen($mietertabelle->getId());
                            }
                            ?>
                        </td>
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
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>


</body>