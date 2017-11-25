<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 17:06
 */
global $mietertabelle;

?>
<div class="container">
    <div class="page-header">
        <h2 class="text-center"><strong>Mieter</strong> erfassen. </h2></div>
    <form action="create" method="post">
        <div class="form-group" style="display: none">
            <div class="input-group">
                <div class="input-group-addon"><span>ID </span></div>
                <input class="form-control" type="hidden" name="id" value="<?php echo !empty($mietertabelle["id"]) ? $mietertabelle["id"] : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Vorname </span></div>
                <input class="form-control" required type="text" name="vorname" value="<?php echo !empty($mietertabelle["vorname"]) ? $mietertabelle["vorname"] : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Nachname </span></div>
                <input class="form-control" required type="text" name="nachname" value="<?php echo !empty($mietertabelle["nachname"]) ? $mietertabelle["nachname"] : ''; ?>">
            </div>
        </div>
        <!--
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Quadratmeter </span></div>
                <input class="form-control" required type="number" name="quadratmeter" value="<?// php echo !empty($mietertabelle["quadratmeter"]) ? $mietertabelle["quadratmeter"] : ''; ?>">
            </div>
        </div>
        -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Quadratmeter </span></div>
                <select class="form-control" required name="quadratmeter">
                    <option value="">Bitte Quadratmeter eingeben</option>
                    <option value="45">45 <?php " m&#xB2";?> - Wohnung 1.1</option>
                    <option value="51">51 <?php " m&#xB2";?> - Wohnung 1.2</option>
                    <option value="56">56 <?php " m&#xB2";?> - Wohnung 1.3</option>
                    <option value="63">63 <?php " m&#xB2";?> - Wohnung 2.1</option>
                    <option value="70">70 <?php " m&#xB2";?> - Wohnung 2.2</option>
                    <option value="77">77 <?php " m&#xB2";?> - Wohnung 2.3</option>
                    <option value="95">95 <?php " m&#xB2";?> - Wohnung 2.4</option>
                    <option value="101">101 <?php " m&#xB2";?> - Wohnung 3.1</option>
                    <option value="115">115 <?php " m&#xB2";?> - Wohnung 4.1</option>
                    <option value="120">120 <?php " m&#xB2";?> - Wohnung 5.1</option>
                    <option value="122">122 <?php " m&#xB2";?> - Wohnung 6.1</option>
                    <option value="130">130 <?php " m&#xB2";?> - Wohnung 7.1</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Mietzins </span></div>
                <input class="form-control" required type="number" name="mietzins" value="<?php echo !empty($mietertabelle["mietzins"]) ? $mietertabelle["mietzins"] : ''; ?>">
            </div>
        </div>


        <div class="btn-group" role="group">
            <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i></button>
            <button class="btn btn-danger" onclick="history.back()" type="submit"> <i class="fa fa-remove"></i></button>
        </div>
    </form>
</div>
