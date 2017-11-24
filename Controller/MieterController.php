<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 08.10.2017
 * Time: 21:48
 */

namespace controller;

use domain\Mieter;
use dao\MieterDAO;
use view\View;
use view\LayoutRendering;

class MieterController
{
    public function create(){
        $mieter = new Mieter();
        //$mieter->setId($_POST["id"]);
        $mieter->setVorname($_POST["vorname"]);
        $mieter->setNachname($_POST["nachname"]);
        $mieter->setQuadratmeter($_POST["quadratmeter"]);
        $mieter->setMietzins($_POST["mietzins"]);
        $mieterDAO = new MieterDAO();
        $mieterDAO->create($mieter);
    }

    public static function readAll(){
        $contentView = new View("mieter.php");
        $contentView->mieter = WECRMServiceImpl::getInstance()->findAllMieter();
        LayoutRendering::basicLayout($contentView);
    }

    public static function edit(){
        $id = $_GET["id"];
        $contentView = new View("mieterEdit.php");
        $contentView->mieter = WECRMServiceImpl::getInstance()->readMieter($id);
        LayoutRendering::basicLayout($contentView);
    }

    public static function update(){
        $mieter = new Mieter();
        $mieter->setId($_POST["id"]);
        $mieter->setVorname($_POST["vorname"]);
        $mieter->setNachname($_POST["nachname"]);
        $mieter->setAdresse($_POST["adresse"]);
        $mieter->setMietzins($_POST["mietzins"]);
        $mieterValidator = new MieterValidator($mieter);
        if($mieterValidator->isValid()) {
            if ($mieter->getId() === "") {
                WECRMServiceImpl::getInstance()->createMieter($mieter);
            } else {
                WECRMServiceImpl::getInstance()->updateMieter($mieter);
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
        WECRMServiceImpl::getInstance()->deleteMieter($id);
    }

}