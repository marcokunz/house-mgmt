<?php
/**
 * Created by PhpStorm.
 * User: Patrick Tuescher
 * Date: 24.11.2017
 * Time: 08:55
 */

class MieterModel
{

    public function createMieter(){
        $mieter = new Mieter();
        $mieterDAO = new MieterDAO();
        $mieterDAO->create($mieter);
    }

}