<?php

namespace dao;

use domain\Mieter;

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
            INSERT INTO mieter (vorname, nachname, adresse, mietzins)
            VALUES (:vorname, :nachname , :adresse, :mietzins)');
        $stmt->bindValue(':vorname', $mieter->getVorname());
        $stmt->bindValue(':nachname', $mieter->getNachname());
        $stmt->bindValue(':adresse', $mieter->getAdresse());
        $stmt->bindValue(':mietzins', $mieter->getMietzins());
        $stmt->execute();
        return $this->read($this->pdoInstance->lastInsertId());
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
            SELECT * FROM mieter WHERE id = :id;');
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
            UPDATE mieter SET 
                vorname = :vorname,
                nachname = :nachname,
                adresse = :adresse,
                mietzins = :mietzins,
            WHERE id = :id');
        $stmt->bindValue(':vorname', $mieter->getVorname());
        $stmt->bindValue(':nachname', $mieter->getNachname());
        $stmt->bindValue(':adresse', $mieter->getAdresse());
        $stmt->bindValue(':mietzins', $mieter->getMietzins());
        $stmt->execute();
        return $this->read($mieter->getId());
	}

	/**
	 * @access public
	 * @param Mieter
	 * @ParamType  Mieter
	 */
	public function delete(Mieter $mieter) {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM mieter
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $mieter->getId());
        $stmt->execute();
	}


}
?>