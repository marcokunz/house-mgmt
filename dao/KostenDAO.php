<?php
/**
 * Created by PhpStorm.
 * User: scuib
 * Date: 04.11.2017
 * Time: 15:40
 */

namespace dao;

use database\Database;
use domain\Kosten;


class KostenDAO extends BasicDAO{


    /**
     * @access public
     * @param Kosten
     * @ParamType kosten Kosten
     * @ReturnType Kosten
     */
    public function create(Mieter $mieter) {
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO mietertabelle (vorname, nachname, adresse, mietzins)
            VALUES (:vorname, :nachname , :adresse, :mietzins)');
        //  $stmt->bindValue(':id', $mieter->getId());
        $stmt->bindValue(':vorname', $mieter->getVorname());
        $stmt->bindValue(':nachname', $mieter->getNachname());
        $stmt->bindValue(':adresse', $mieter->getAdresse());
        $stmt->bindValue(':mietzins', $mieter->getMietzins());
        $stmt->execute();
        //return $this->read($this->pdoInstance->lastInsertId());
    }

    /**
     * @access public
     * @param int mieterId
     * @return Mieter
     * @ParamType mieterId int
     * @ReturnType Mieter
     */
    public function read($mieterId) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM mietertabelle WHERE id = :id;');
        $stmt->bindValue(':id', $mieterId);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Mieter")[0];
    }

    /**
     * @access public
     * @param Mieter
     * @return Mieter
     * @ParamType  Mieter
     * @ReturnType Mieter
     */
    public function update(Mieter $mieter) {
        $stmt = $this->pdoInstance->prepare('
             UPDATE mietertabelle SET 
                id = :id,
                vorname = :vorname,
                nachname = :nachname,
                adresse = :adresse,
                mietzins = :mietzins
            WHERE id = :id');
        $stmt->bindValue(':id', $mieter->getId());
        $stmt->bindValue(':vorname', $mieter->getVorname());
        $stmt->bindValue(':nachname', $mieter->getNachname());
        $stmt->bindValue(':adresse', $mieter->getAdresse());
        $stmt->bindValue(':mietzins', $mieter->getMietzins());
        $stmt->execute();
    }


    public function readAll(){
        $pdoInstance = Database::connect();
        $stmt = $pdoInstance->prepare('
            SELECT * FROM kosten');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Kosten");
        //return $stmt->fetchAll(\PDO::FETCH_COLUMN, "2");
    }


}
?>