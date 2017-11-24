<?php
/**
 * Created by PhpStorm.
 * User: marcokunz
 * Date: 21.11.17
 * Time: 19:04
 */

namespace dao;

use domain\Mieter;
use database\Database;
use dao\KostenDAO;
use domain\Kosten;
use domain\Einnahme;


class EinnahmeDAO extends BasicDAO {

    /**
     * @access public
     * @param Mieter
     * @return Mieter
     * @ParamType mieter Mieter
     * @ReturnType Mieter
     */
    public function create(Einnahme $einnahme) {
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO einnahmen (datum, betrag, mieter_fk)
            VALUES (:datum, :betrag , :mieter_fk)');
        //  $stmt->bindValue(':id', $mieter->getId());
        $stmt->bindValue(':datum', $einnahme->getDatum());
        $stmt->bindValue(':betrag', $einnahme->getBetrag());
        $stmt->bindValue(':mieter_fk', $einnahme->getMieterFk());
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
    public function read($einnahmenId) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM einnahmen WHERE id = :id;');
        $stmt->bindValue(':id', $einnahmenId);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Einnahme")[0];
    }



    public function getTotalEinnahmen($mieterId) {
        $stmt = $this->pdoInstance->prepare('
            SELECT sum(einnahmen.betrag) FROM einnahmen where id = :id;');
        $stmt->bindValue(':id', $mieterId);
        $stmt->execute();
        return $stmt->fetch()[0];
    }

    /**
     * @access public
     * @param Mieter
     * @return Mieter
     * @ParamType  Mieter
     * @ReturnType Mieter
     */
    public function update(Einnahme $einnahme) {
        $stmt = $this->pdoInstance->prepare('
             UPDATE einnahmen SET 
                id = :id,
                datum = :datum,
                betrag = :betrag,
                mieter_fk = :mieter_fk
            WHERE id = :id');
        $stmt->bindValue(':id', $einnahme->getId());
        $stmt->bindValue(':datum', $einnahme->getDatum());
        $stmt->bindValue(':betrag', $einnahme->getBetrag());
        $stmt->bindValue(':mieter_fk', $einnahme->getMieterFk());
        $stmt->execute();
    }

    /**
     * @access public
     * @param Mieter
     * @ParamType  Mieter
     */
    public function delete(Einnahme $einnahme) {

        $stmt = $this->pdoInstance->prepare('
            DELETE FROM einnahmen
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $einnahme->getId());
        $stmt->execute();

    }

    public function readAll(){
        $pdoInstance = Database::connect();
        $stmt = $pdoInstance->prepare('
            SELECT * FROM einnahmen');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Einnahme");
        //return $stmt->fetchAll(\PDO::FETCH_COLUMN, "2");
    }


}
?>