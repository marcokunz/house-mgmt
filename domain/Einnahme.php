<?php
namespace domain;
/**
 * @access public
 * @author marcokunz
 */
class Einnahme
{

    protected $id;
    protected $datum; //@AttributeType Date
    protected $betrag;// @AttributeType BigDecimal
    private $mieter_fk;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * @param mixed $datum
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;
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
    public function getMieterFk()
    {
        return $this->mieter_fk;
    }

    /**
     * @param mixed $mieter_fk
     */
    public function setMieterFk($mieter_fk)
    {
        $this->mieter_fk = $mieter_fk;
    }

}
