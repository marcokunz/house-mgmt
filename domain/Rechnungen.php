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
    public $id;
    /**
     * @AttributeType String
     */
    public $typ;
    /**
     * @AttributeType String
     */
    public $betrag;
    /**
     * @AttributeType Date
     */
    public $datum;

    /**
     * @return mixed
     */
    public function getKosten()
    {
        return $this->kosten;
    }

    /**
     * @param mixed $kosten
     */
    public function setKosten($kosten)
    {
        $this->kosten = $kosten;
    }
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





}
