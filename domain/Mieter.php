<?php
/**
 * Created by PhpStorm.
 * User: marcokunz
 * Date: 03.11.17
 * Time: 16:45
 */

namespace domain;


class Mieter

{

    private $id; // integer
    private $vorname; // varchar(255)
    private $nachname; // varchar(255)
    private $quadratmeter; // integer
    private $mietzins; // integer


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
    public function getVorname()
    {
        return $this->vorname;
    }

    /**
     * @param mixed $vorname
     */
    public function setVorname($vorname)
    {
        $this->vorname = $vorname;
    }

    /**
     * @return mixed
     */
    public function getNachname()
    {
        return $this->nachname;
    }

    /**
     * @param mixed $nachname
     */
    public function setNachname($nachname)
    {
        $this->nachname = $nachname;
    }

    /**
     * @return mixed
     */
    public function getQuadratmeter()
    {
        return $this->quadratmeter;
    }

    /**
     * @param mixed $quadratmeter
     */
    public function setQuadratmeter($quadratmeter)
    {
        $this->quadratmeter = $quadratmeter;
    }

    /**
     * @return mixed
     */
    public function getMietzins()
    {
        return $this->mietzins;
    }

    /**
     * @param mixed $mietzins
     */
    public function setMietzins($mietzins)
    {
        $this->mietzins = $mietzins;
    }


}

