<?php
namespace domain;
/**
 * @access public
 * @author marcokunz
 */
class Kosten {


    /**
     * @AttributeType String
     */
    protected $_typ;
    /**
     * @AttributeType int
     */
    protected $_betrag;
    /**
     * @AssociationType Rechnungen
     * @AssociationMultiplicity 1
     */
    private $_rechnungen;


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
    public function getRechnungen()
    {
        return $this->_rechnungen;
    }

    /**
     * @param mixed $rechnungen
     */
    public function setRechnungen($rechnungen)
    {
        $this->_rechnungen = $rechnungen;
    }

}
?>