<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 08.10.2017
 * Time: 21:48
 */

namespace controller;

use domain\Mieter;
use validator\MieterValidator;
use service\houseMgmtServiceImpl;
use view\View;
use view\LayoutRendering;

class MieterController
{
    public static function create(){
        $contentView = new View("mieterEdit.php");
        LayoutRendering::basicLayout($contentView);
    }

    public static function readAll(){
        $contentView = new View("mieter.php");
        $contentView->mieter = houseMgmtServiceImpl::getInstance()->findAllMieter();
        LayoutRendering::basicLayout($contentView);
    }

    public static function edit(){
        $id = $_GET["id"];
        $contentView = new View("mieterEdit.php");
        $contentView->mieter = houseMgmtServiceImpl::getInstance()->readMieter($id);
        LayoutRendering::basicLayout($contentView);
    }

    public static function update(){
        $mieter = new Mieter();
        $mieter->setVorname($_POST["vorname"]);
        $mieter->setNachname($_POST["nachname"]);
        $mieter->setAdresse($_POST["adresse"]);
        $mieter->setMietzins($_POST["mietzins"]);
        $mieterValidator = new MieterValidator($mieter);
        if($mieterValidator->isValid()) {
            if ($mieter->getId() === "") {
                houseMgmtServiceImpl::getInstance()->createMieter($mieter);
            } else {
                houseMgmtServiceImpl::getInstance()->updateMieter($mieter);
            }
        }
        else{
            $contentView = new View("mieterEdit.php");
            $contentView->mieter = $mieter;
            $contentView->mieterValidator = $mieterValidator;
            LayoutRendering::basicLayout($contentView);
            return false;
        }
        return true;
    }

    public static function delete(){
        $id = $_GET["id"];
        houseMgmtServiceImpl::getInstance()->deleteMieter($id);
    }

}