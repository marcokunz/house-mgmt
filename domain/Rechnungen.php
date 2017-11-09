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
    protected $_id;
    /**
     * @AttributeType String
     */
    protected $_typ;
    /**
     * @AttributeType String
     */
    protected $_betrag;
    /**
     * @AttributeType Date
     */
    protected $_datum;
    /**
     * @AssociationType Kosten
     * @AssociationMultiplicity 1
     */
    private $_kosten;



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