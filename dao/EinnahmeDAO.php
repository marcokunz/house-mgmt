<?php
/**
 * Created by PhpStorm.
 * User: scuib
 * Date: 04.11.2017
 * Time: 15:40
 */

namespace dao;


class EinnahmeDAO extends BasicDAO
{
    public function create(Einnahme $einnahme) {
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO einnahmen (datum, betrag,mieter_fk)
            VALUES (:datum, :betrag, :mieter)');
        $stmt->bindValue(':datum', $einnahme->getDatum());
        $stmt->bindValue(':betrag', $einnahme->getBetrag());
        $stmt->bindValue(':mieter', $einnahme->getMieter()->getId());
        $stmt->execute();
        return $this->read($this->pdoInstance->lastInsertId());
    }
    public function read($einnahmeID) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM einnahmen WHERE id = :id;');
        $stmt->bindValue(':id', $einnahmeID);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Einnahme")[0];
    }
}