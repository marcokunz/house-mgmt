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
use dao\BasicDAO;
use domain\Rechnungen;

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
        if($kostenart=="Heizkosten") {
            $stmt = $this->pdoInstance->prepare('
            SELECT sum(kosten.betrag) FROM kosten JOIN rechnungen ON kosten.rechnungen_fk = rechnungen.id WHERE kosten.mieter_fk = :id AND rechnungen.typ = :kostenart ;');
            $stmt->bindValue(':kostenart', $kostenart);
        }
        else{
            $stmt = $this->pdoInstance->prepare('
            SELECT sum(kosten.betrag) FROM kosten JOIN rechnungen ON kosten.rechnungen_fk = rechnungen.id WHERE kosten.mieter_fk = :id AND 
            rechnungen.typ = "Reparaturkosten" OR 
            rechnungen.typ = "Wasserkosten" OR 
            rechnungen.typ = "Stromkosten" OR 
            rechnungen.typ = "Hauswartrechnungen" OR 
            
            
            ;');

        }
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
    public function update(Kosten $kosten) {
        $stmt = $this->pdoInstance->prepare('
             UPDATE kosten SET 
                betrag = :betrag
            WHERE rechnungen_fk = :rechnungen_fk AND mieter_fk = :mieter_fk');
        $stmt->bindValue(':betrag', $kosten->getBetrag());
        $stmt->bindValue(':rechnungen_fk', $kosten->getRechnungen_fk());
        $stmt->bindValue(':mieter_fk', $kosten->getMieter_fk());
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
            DELETE FROM kosten where mieter_fk = :id;
        ');
        $stmt->bindParam(':id', $mieter->getId());
        $stmt->execute();
    }
    
    public function deleteRechnung(Rechnungen $rechnung) {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM kosten where rechnungen_fk = :id;
        ');
        $stmt->bindParam(':id', $rechnung->getId());
        $stmt->execute();
    }


}
?>