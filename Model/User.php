<?php

namespace Model;


abstract class User{
    protected $email;
    protected $naam;
    protected $functie;
    protected $role;
    protected $id;
    protected $wachtwoord;

    /**
     * Get the value of functie
     */ 
    public function getFunctie(){
        return $this->functie;
    }

    /**
     * Set the value of functie
     *
     * @return  self
     */ 
    public function setFunctie($functie){
        $this->functie = $functie;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole(){
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role){
        $this->role = $role;
        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId(){
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail(){
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    /**
     * Get the value of wachtwoord
     */ 
    public function getWachtwoord(){
        return $this->wachtwoord;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setWachtwoord($wachtwoord){
        $this->wachtwoord = $wachtwoord;
        return $this;
    }

    /**
     * Get the value of naam
     */ 
    public function getNaam(){
        return $this->naam;
    }

    /**
     * Set the value of naam
     *
     * @return  self
     */ 
    public function setNaam($naam){
        $this->naam = $naam;
        return $this;
    }
}
    