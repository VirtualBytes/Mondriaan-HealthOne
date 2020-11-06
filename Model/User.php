<?php

namespace Model;


abstract class User{
    protected $email;
    protected $naam;
    protected $functie;
    protected $role;
    protected $id;
    protected $wachtwoord;

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
    