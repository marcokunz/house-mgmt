<?php

namespace dao;

use domain\Mieter;
use domain\Rechnungen;
use database\Database;

/**
 * @access public
 * @author patrick.tuescher
 */
class RechnungenDAO extends BasicDAO {

    /**
     * @access public
     * @param Rechnugen
     * @return Rechnungen
     * @ParamType rechnungen Rechnungen
     * @ReturnType Rechnungen
     */
    public function create(Rechnungen $rechnungen) {
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO rechnungen (typ, betrag, datum)
            VALUES (:typ, :betrag, :datum)');
        //$stmt->bindValue(':id', $rechnungen->getId());
        $stmt->bindValue(':typ', $rechnungen->getTyp());
        $stmt->bindValue(':betrag', $rechnungen->getBetrag());
        $stmt->bindValue(':datum', $rechnungen->getDatum());
        $stmt->execute();
        //return $this->read($this->pdoInstance->lastInsertId());

        /*$kosten = new Kosten();
        $kosten->setBetrag($rechnungen->getBetrag());
        $kosten->setRechnungen_fk($rechnungen->getId());
        $kostenDAO = new KostenDAO();
        $kostenDAO->create($kosten);*/


    }

    /**
     * @access public
     * @param int rechnungenId
     * @return Rechnungen
     * @ParamType rechnungenId int
     * @ReturnType Rechnungen
     */
    public function read($rechnungenId) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM rechnungen WHERE id = :id;');
        $stmt->bindValue(':id', $rechnungenId);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Rechnungen")[0];
    }

    /**
     * @access public
     * @param Rechnungen
     * @return Rechnungen
     * @ParamType  Rechnungen
     * @ReturnType Rechnungen
     */
    public function update(Rechnungen $rechnungen) {
        $stmt = $this->pdoInstance->prepare('
             UPDATE rechnungen SET 
                id = :id,
                typ = :typ,
                betrag = :betrag,
                datum = :datum
            WHERE id = :id');
        $stmt->bindValue(':id', $rechnungen->getId());
        $stmt->bindValue(':typ', $rechnungen->getTyp());
        $stmt->bindValue(':betrag', $rechnungen->getBetrag());
        $stmt->bindValue(':datum', $rechnungen->getDatum());
        $stmt->execute();
        //return $this->read($rechnungen->getId());
    }

    /**
     * @access public
     * @param Rechnungen
     * @ParamType  Rechnungen
     */
    public function delete(Rechnungen $rechnungen) {

        //Dazugehörige Nebenkosten löschen

        //Rechnung löschen
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM rechnungen
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $rechnungen->getId());
        $stmt->execute();

        $stmt1 = $this->pdoInstance->prepare('
            DELETE FROM kosten
            WHERE kosten.id = 1
        ');

        //$stmt->bindValue(':id', $rechnungen->getId());
        $stmt1->execute();

    }





    public function readAll(){
        $pdoInstance = Database::connect();
        $stmt = $pdoInstance->prepare('
            SELECT * FROM rechnungen');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Rechnungen");
        //return $stmt->fetchAll(\PDO::FETCH_COLUMN, "2");
    }



}
?>