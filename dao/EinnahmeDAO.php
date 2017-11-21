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
                quadratmeter = :quadratmeter,
                mietzins = :mietzins
            WHERE id = :id');
        $stmt->bindValue(':id', $mieter->getId());
        $stmt->bindValue(':vorname', $mieter->getVorname());
        $stmt->bindValue(':nachname', $mieter->getNachname());
        $stmt->bindValue(':quadratmeter', $mieter->getQuadratmeter());
        $stmt->bindValue(':mietzins', $mieter->getMietzins());
        $stmt->execute();
    }

    /**
     * @access public
     * @param Mieter
     * @ParamType  Mieter
     */
    public function delete(Mieter $mieter) {
        $kostendao = new KostenDAO();
        $kostendao->delete($mieter);

        $stmt = $this->pdoInstance->prepare('
            DELETE FROM mietertabelle
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $mieter->getId());
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