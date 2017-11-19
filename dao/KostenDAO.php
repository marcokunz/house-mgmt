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
use dao\MieterDAO;
use domain\Mieter;

class KostenDAO extends BasicDAO{


    /**
     * @access public
     * @param Kosten
     * @ParamType kosten Kosten
     * @ReturnType Kosten
     */
    public function create(Kosten $kosten) {
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO kosten (betrag, rechnungen_fk, mieter_fk)
            VALUES (:betrag , :rechnungen_fk, :mieter_fk)');
        //  $stmt->bindValue(':id', $mieter->getId());
        $stmt->bindValue(':betrag', $kosten->getBetrag());
        $stmt->bindValue(':rechnungen_fk', $kosten->getRechnungen_fk());
        //$stmt->bindValue(':mieter_fk', 1);
        $stmt->bindValue(':mieter_fk', $kosten->getMieter_fk());

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
    public function getTotalKosten($mieterId, $kostenart) {
        $mieterDAO = new MieterDAO();
        $mieter = $mieterDAO->readAll();
        $stmt = $this->pdoInstance->prepare('
            SELECT sum(kosten.betrag) FROM kosten JOIN rechnungen ON kosten.rechnungen_fk = rechnungen.id WHERE kosten.mieter_fk = :id AND rechnungen.typ = :kostenart ;');
        $stmt->bindValue(':id', $mieterId);
        $stmt->bindValue(':kostenart', $kostenart);
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

    public function delete(Mieter $mieter) {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM kosten
            WHERE mieter_fk = 18;
        ');
        $stmt->bindValue(':id', $mieter->getId());
        $stmt->execute();
    }
}
?>