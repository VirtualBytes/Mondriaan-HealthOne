<?php

namespace Model;


class Medicijn{
    protected $id;
    protected $naam;
    protected $werking;
    protected $bijwerking;
    protected $prijs;
    
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