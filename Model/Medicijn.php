<?php

namespace Model;


class Medicijn{
    protected $id;
    protected $naam;
    protected $werking;
    protected $bijwerking;
    protected $prijs;
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

    /**
     * Get the value of bijwerking
     */ 
    public function getBijwerking(){
        return $this->bijwerking;
    }

    /**
     * Set the value of bijwerking
     *
     * @return  self
     */ 
    public function setBijwerking($bijwerking){
        $this->bijwerking = $bijwerking;
        return $this;
    }

    /**
     * Get the value of prijs
     */ 
    public function getPrijs(){
        return $this->prijs;
    }

    /**
     * Set the value of prijs
     *
     * @return  self
     */ 
    public function setPrijs($prijs){
        $this->prijs = $prijs;
        return $this;
    }

    /**
     * Get the value of werking
     */ 
    public function getWerking(){
        return $this->werking;
    }

    /**
     * Set the value of werking
     *
     * @return  self
     */ 
    public function setWerking($werking){
        $this->werking = $werking;
        return $this;
    }
}