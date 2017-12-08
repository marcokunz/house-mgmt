<?php

/**
 * Created by PhpStorm.
 * User: scuib
 * Date: 08.12.2017
 * Time: 14:41
 */
class Adresse
{
    var $adresse = 'Hagenholzstrasse 62';
    var $plz = 3800;
    var $ort = 'Interlaken';

    function setAdresse($adresse, $plz, $ort){
        $this->$adresse = $adresse;
        $this->plz = $plz;
        $this-> ort = $ort;
    }
    function getAdresse(){
        return $this->adresse;
    }
    function getPLZ(){
        return $this->plz;
    }
    function getOrt(){
        return $this->ort;
    }
}