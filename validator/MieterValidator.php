<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 11.10.2017
 * Time: 11:21
 */

namespace validator;

use domain\Mieter;

class MieterValidator
{
    private $valid = true;
    private $vornameError = null;
    private $nachnameError = null;
    private $adresseError = null;
    private $mietzinsError = null;

    public function __construct(Mieter $mieter)
    {
        $this->validate($mieter);
    }

    public function validate(Mieter $mieter)
    {
        if (!is_null($mieter)) {
            if (empty($mieter->getVorname())) {
                $this->vornameError = 'Geben Sie bitte einen Vornamen ein';
                $this->valid = false;
            }

            if (empty($mieter->getNachname())) {
                $this->nachnameError = 'Geben Sie bitte einen Nachnamen ein';
                $this->valid = false;
            }

            if (empty($mieter->getAdresse())) {
                $this->adresseError = 'Geben Sie bitte eine Adresse ein';
                $this->valid = false;
            }

            if (empty($mieter->getMietzins())) {
                $this->mietzinsError = 'Geben Sie bitte eine Adresse ein';
                $this->valid = false;
            }


        } else {
            $this->valid = false;
        }
        return $this->valid;

    }

    public function isValid()
    {
        return $this->valid;
    }

    public function isVornameError()
    {
        return isset($this->vornameError);
    }

    public function getVorameError()
    {
        return $this->vornameError;
    }

    public function isNachnameError()
    {
        return isset($this->nachnameError);
    }

    public function getNachnameError()
    {
        return $this->nachnameError;
    }

    public function isAdresseError()
    {
        return isset($this->adresseError);
    }

    public function getAdresseError()
    {
        return $this->adresseError;
    }

    public function isMietzinsError()
    {
        return isset($this->mietzinsError);
    }

    public function getMietzinsError()
    {
        return $this->mietzinsError;
    }
}