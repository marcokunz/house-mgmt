<?php
namespace domain;
/**
 * @access public
 * @author marcokunz
 */
class Rechnungen {
    /**
     * @AttributeType int
     */
    public $_id;
    /**
     * @AttributeType String
     */
    public $_typ;
    /**
     * @AttributeType String
     */
    public $_betrag;
    /**
     * @AttributeType Date
     */
    public $_datum;
    /**
     * @AssociationType Kosten
     * @AssociationMultiplicity 1
     */

    /**
     * Rechnungen constructor.
     * @param $_id
     * @param $_typ
     * @param $_betrag
     * @param $_datum
     */


    /**
     * @return mixed
     */
    public function getKosten()
    {
        return $this->_kosten;
    }

    /**
     * @param mixed $kosten
     */
    public function setKosten($kosten)
    {
        $this->_kosten = $kosten;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getTyp()
    {
        return $this->_typ;
    }

    /**
     * @param mixed $typ
     */
    public function setTyp($typ)
    {
        $this->_typ = $typ;
    }

    /**
     * @return mixed
     */
    public function getBetrag()
    {
        return $this->_betrag;
    }

    /**
     * @param mixed $betrag
     */
    public function setBetrag($betrag)
    {
        $this->_betrag = $betrag;
    }

    /**
     * @return mixed
     */
    public function getDatum()
    {
        return $this->_datum;
    }

    /**
     * @param mixed $datum
     */
    public function setDatum($datum)
    {
        $this->_datum = $datum;
    }

}
?>