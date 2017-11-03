<?php
namespace domain;
/**
 * @access public
 * @author marcokunz
 */
class Einnahmen {
    /**
     * @AttributeType Date
     */
    protected $_datum;
    /**
     * @AttributeType BigDecimal
     */
    protected $_betrag;
    /**
     * @AssociationType Mieter
     * @AssociationMultiplicity 1
     */
    private $_mieter;


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
    public function getMieter()
    {
        return $this->_mieter;
    }

    /**
     * @param mixed $mieter
     */
    public function setMieter($mieter)
    {
        $this->_mieter = $mieter;
    }

}
?>