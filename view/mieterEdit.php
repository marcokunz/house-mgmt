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
        <h2 class="text-center"><strong>Mieter</strong> editieren. </h2></div>
    <form action="edit" method="post">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>ID </span></div>
                <input class="form-control" type="text" name="id"  readonly ="" value="<?php echo isset($mietertabelle) ? ($mietertabelle->getId()) : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Vorname </span></div>
                <input class="form-control" type="text" name="vorname" value="<?php echo isset($mietertabelle) ? ($mietertabelle->getVorname()) : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Nachname </span></div>
                <input class="form-control" type="text" name="nachname" value="<?php echo isset($mietertabelle) ? ($mietertabelle->getNachname()) : ''; ?>">
            </div>
        </div>
        <!--
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Quadratmeter </span></div>
                <input class="form-control" type="text" name="quadratmeter" value="<?php echo isset($mietertabelle) ? ($mietertabelle->getQuadratmeter()): ''; ?>">
            </div>
        </div>
        -->

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Quadratmeter </span></div>
                <select class="form-control" required name="quadratmeter">
                    <option value="45"<?php if ($mietertabelle->getQuadratmeter()== 45) echo'selected="selected"';?>>45 m2 - Wohnung 1.1</option>
                    <option value="51"<?php if ($mietertabelle->getQuadratmeter()== 51) echo'selected="selected"';?>>51 m2 - Wohnung 1.2</option>
                    <option value="56"<?php if ($mietertabelle->getQuadratmeter()== 56) echo'selected="selected"';?>>56 m2 - Wohnung 1.3</option>
                    <option value="63"<?php if ($mietertabelle->getQuadratmeter()== 63) echo'selected="selected"';?>>63 m2 - Wohnung 2.1</option>
                    <option value="70"<?php if ($mietertabelle->getQuadratmeter()== 70) echo'selected="selected"';?>>70 m2 - Wohnung 2.2</option>
                    <option value="77"<?php if ($mietertabelle->getQuadratmeter()== 77) echo'selected="selected"';?>>77 m2 - Wohnung 2.3</option>
                    <option value="95"<?php if ($mietertabelle->getQuadratmeter()== 95) echo'selected="selected"';?>>95 m2 - Wohnung 2.4</option>
                    <option value="101"<?php if ($mietertabelle->getQuadratmeter()== 101) echo'selected="selected"';?>>101 m2 - Wohnung 3.1</option>
                    <option value="115"<?php if ($mietertabelle->getQuadratmeter()== 115) echo'selected="selected"';?>>115 m2 - Wohnung 4.1</option>
                    <option value="120"<?php if ($mietertabelle->getQuadratmeter()== 120) echo'selected="selected"';?>>120 m2 - Wohnung 5.1</option>
                    <option value="122"<?php if ($mietertabelle->getQuadratmeter()== 122) echo'selected="selected"';?>>122 m2 - Wohnung 6.1</option>
                    <option value="130"<?php if ($mietertabelle->getQuadratmeter()== 130) echo'selected="selected"';?>>130 m2 - Wohnung 7.1</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Mietzins </span></div>
                <input class="form-control" type="number" name="mietzins" value="<?php echo isset($mietertabelle) ? ($mietertabelle->getMietzins()): ''; ?>">
            </div>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i></button>
            <button class="btn btn-danger" onclick="history.back()" type="submit"> <i class="fa fa-remove"></i></button>
        </div>
    </form>
</div>
