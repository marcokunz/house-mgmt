<?php

namespace dao;


use domain\Rechnungen;
use domain\Kosten;
use database\Database;


/**
 * @access public
 * @author patrick.tuescher
 */
class RechnungenDAO extends BasicDAO {

    /**
     * @access public
     * @param Rechnungen $rechnungen
     * @return void
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

        $currentRechnung = $this->pdoInstance->lastInsertId();
        $mieterDAO = new MieterDAO();
        $mieter = $mieterDAO->readAll();
        $totalgroesse = 0;
        $rechnungsbetrag = $rechnungen->getBetrag();
        foreach($mieter as $mietertabelle){
            $totalgroesse += $mietertabelle->getQuadratmeter();
        }
        foreach($mieter as $mietertabelle){
            $kosten = new Kosten();
            //Betrag berechnen
            $betrag = intval($rechnungsbetrag/$totalgroesse*$mietertabelle->getQuadratmeter());
            //$betrag = 100;
            $kosten->setBetrag($betrag);
            $kosten->setRechnungen_fk($currentRechnung);
            $kosten->setMieter_fk($mietertabelle->getId());
            $kostenDAO = new KostenDAO();
            $kostenDAO->create($kosten);
            }
        //return $this->read($this->pdoInstance->lastInsertId());*/
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
     * @param Rechnungen $rechnungen
     * @return void
     * @ParamType  Rechnungen
     * @ReturnType Rechnungen
     */
    public function update(Rechnungen $rechnungen)
    {
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

        $currentRechnung = $rechnungen->getId();
        $mieterDAO = new MieterDAO();
        $mieter = $mieterDAO->readAll();
        $totalgroesse = 0;
        $rechnungsbetrag = $rechnungen->getBetrag();
        foreach ($mieter as $mietertabelle) {
            $totalgroesse += $mietertabelle->getQuadratmeter();
        }
        foreach ($mieter as $mietertabelle) {
            $kosten = new Kosten();
            //Betrag berechnen
            $betrag = ($rechnungsbetrag / $totalgroesse * $mietertabelle->getQuadratmeter());
            //$betrag = 100;
            $kosten->setBetrag($betrag);
            $kosten->setRechnungen_fk($currentRechnung);
            $kosten->setMieter_fk($mietertabelle->getId());
            $kostenDAO = new KostenDAO();
            $kostenDAO->update($kosten);

        }
    }

    /**
     * @access public
     * @param Rechnungen $rechnungen
     * @ParamType  Rechnungen
     */
    public function delete(Rechnungen $rechnungen) {


        //Rechnung löschen
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM rechnungen
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $rechnungen->getId());
        $stmt->execute();

        //Kosten müssen gelöscht werden, sonst gibt's einen DB-Fehler


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
