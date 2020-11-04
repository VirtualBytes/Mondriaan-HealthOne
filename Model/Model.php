<?php

namespace Model;

include_once("View/View.php");
include_once("Model/User.php");
include_once("Model/Medicijn.php");
session_start();

class Model{
    public function connectDB(){
        try {
            $this->database = new \PDO("mysql:host=localhost;dbname=HealthOne", "root", "");
            $this->database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e){
        echo "Connection failed: " . $e->getMessage();
        }
    }
    public function getArtsen(){
        $this->connectDB();
        $query = $this->database->query("SELECT * FROM artsen");
    
        if($query){
            $result = $query->fetchAll(\PDO::FETCH_CLASS,Arts::class);
            return $result;
        }
    }
    public function getMedicijnen(){
        $this->connectDB();
        $query = $this->database->query("SELECT * FROM medicijnen");
    
        if($query){
            $result = $query->fetchAll(\PDO::FETCH_CLASS,Medicijn::class);
            return $result;
        }
    }
    public function getEditedMedicine(){
        $this->connectDB();
        $getCurrentMedicijn = intval($_SESSION['CurrentMedicijnEdit']);
        $query = $this->database->prepare ("SELECT * FROM medicijnen WHERE id=:currentMedicijn");
        $query->bindParam(':currentMedicijn',  $getCurrentMedicijn);
        $result = $query->execute();
            
        if ($query){
            $result = $query->fetchAll(\PDO::FETCH_CLASS,Medicijn::class);
            return $result['0'];
        }
    }
    public function logOut(){
        unset($_SESSION['id']);
        unset($_SESSION['user']);
        unset($_SESSION['functie']);
        unset($_SESSION['role']);
    }
    public function addMedicijn($naam, $werking, $bijwerking, $prijs){
        $this->connectDB();
        try{
            $query = $this->database->prepare ("INSERT INTO `medicijnen` (`id`,`naam`,`werking`,`bijwerking`,`prijs`) VALUES(NULL, :naam, :werking, :bijwerking, :prijs);");
            $query->bindParam(":naam", $naam);
            $query->bindParam(":werking", $werking);
            $query->bindParam(":bijwerking",$bijwerking);
            $query->bindParam(":prijs",$prijs);
            $result = $query->execute();
            return $result;
        }
        catch(\PDOException $e){
            echo"Error: ".$e->getMessage();
        }
    }
    public function deleteMedicijn($id){
        $this->connectDB();
        try{
            $query = $this->database->prepare ("DELETE FROM `medicijnen` WHERE id=:id");
            $query->bindParam(":id", $id);
            $result = $query->execute();
            return $result;
        }
        catch(\PDOException $e){
            echo"Error: ".$e->getMessage();
        }
    }
    public function editMedicijn($id, $naam, $werking, $bijwerking, $prijs){
        $this->connectDB();
        try{
            $query = $this->database->prepare ("UPDATE `medicijnen` SET `naam` = :naam, `werking` = :werking, `bijwerking` = :bijwerking, `prijs` = :prijs WHERE `id` = :id");
            $query->bindParam(":id", $id);
            $query->bindParam(":naam", $naam);
            $query->bindParam(":werking", $werking);
            $query->bindParam(":bijwerking",$bijwerking);
            $query->bindParam(":prijs",$prijs);
            $query->execute();
        }
        catch(\PDOException $e){
            echo"Error: ".$e->getMessage();
        }
    }
}