<?php

namespace dao;

use domain\Mieter;
use database\Database;
use dao\KostenDAO;

/**
 * @access public
 * @author andreas.martin
 */
class MieterDAO extends BasicDAO {

	/**
	 * @access public
	 * @param Mieter
	 * @return Mieter
	 * @ParamType mieter Mieter
	 * @ReturnType Mieter
	 */
	public function create(Mieter $mieter) {
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO mietertabelle (vorname, nachname, quadratmeter, mietzins)
            VALUES (:vorname, :nachname , :quadratmeter, :mietzins)');
      //  $stmt->bindValue(':id', $mieter->getId());
        $stmt->bindValue(':vorname', $mieter->getVorname());
        $stmt->bindValue(':nachname', $mieter->getNachname());
        $stmt->bindValue(':quadratmeter', $mieter->getQuadratmeter());
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
            SELECT * FROM mietertabelle');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Mieter");
        //return $stmt->fetchAll(\PDO::FETCH_COLUMN, "2");
    }


}
?>