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
    protected $typ;
    /**
     * @AttributeType int
     */
    protected $betrag;
    /**
     * @AssociationType Rechnungen
     * @AssociationMultiplicity 1
     */
    private $rechnungen;


    /**
     * @return mixed
     */
    public function getTyp()
    {
        return $this->typ;
    }

    /**
     * @param mixed $typ
     */
    public function setTyp($typ)
    {
        $this->typ = $typ;
    }

    /**
     * @return mixed
     */
    public function getBetrag()
    {
        return $this->betrag;
    }

    /**
     * @param mixed $betrag
     */
    public function setBetrag($betrag)
    {
        $this->betrag = $betrag;
    }

    /**
     * @return mixed
     */
    public function getRechnungen()
    {
        return $this->rechnungen;
    }

    /**
     * @param mixed $rechnungen
     */
    public function setRechnungen($rechnungen)
    {
        $this->rechnungen = $rechnungen;
    }

}
?>