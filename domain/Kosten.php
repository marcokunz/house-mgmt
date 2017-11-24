<?php
namespace domain;
/**
 * @access public
 * @author marcokunz
 */
class Kosten {

    /**
     * @AttributeType int
     */
    protected $betrag;
    /**
     * @AssociationType Rechnungen
     * @AssociationMultiplicity 1
     */
    private $rechnungen_fk;

    /**
     * @AssociationType Mieter
     * @AssociationMultiplicity 1
     */
    private $mieter_fk;

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
    public function getRechnungen_fk()
    {
        return $this->rechnungen_fk;
    }

    /**
     * @param mixed $rechnungen
     */
    public function setRechnungen_fk($rechnungen)
    {
        $this->rechnungen_fk = $rechnungen;
    }

    /**
     * @return mixed
     */
    public function getMieter_fk()
    {
        return $this->mieter_fk;
    }

    /**
     * @param mixed $rechnungen
     */
    public function setMieter_fk($mieter)
    {
        $this->mieter_fk = $mieter;
    }

    /**
     * @return mixed
     */
    public function getTyp()
    {
        return $this->typ;
    }

    /**
     * @param mixed $rechnungen
     */
    public function setTyp($typ)
    {
        $this->typ = $typ;
    }


}
?>