<?php

namespace Model;


class Recept{
    protected $id;
    protected $med_id;
    protected $patient_id;
    protected $naam;
    protected $prijs;
    protected $hoeveelheid;
    protected $user_id;
    protected $volnaam;
    protected $recept_id;

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }
}