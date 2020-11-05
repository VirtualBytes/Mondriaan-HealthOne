<?php

namespace Model;

include_once("View/View.php");
include_once("Model/User.php");
include_once("Model/Medicijn.php");
session_start([ //Expire cookies after 1 day
    'cookie_lifetime' => 86400,
]);

class Model{
    private $currentMedicijn;

    public function connectDB(){ //Make connection to database
        try {
            $this->database = new \PDO("mysql:host=localhost;dbname=HealthOne", "root", "");
            $this->database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e){
        echo "Connection failed: " . $e->getMessage();
        }
    }
    public function getMedicijnen(){ //Get all medicijns and makes a class Medicijn
        $this->connectDB();
        try{
            $query = $this->database->query("SELECT * FROM medicijnen");
        
            if($query){
                $result = $query->fetchAll(\PDO::FETCH_CLASS,Medicijn::class);
                return $result;
            }
        } catch(\PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function getEditedMedicine(){ //Gets a single medicijn that matches the one being edited.
        $this->connectDB();
        try {
            $getCurrentMedicijn = $this->currentMedicijn; //here give current medicijn
            $query = $this->database->prepare ("SELECT * FROM medicijnen WHERE id=:currentMedicijn");
            $query->bindParam(':currentMedicijn',  $getCurrentMedicijn);
            $result = $query->execute();

            if($result){ //If a email matches given email
                $query->setFetchMode(\PDO::FETCH_CLASS,Medicijn::class);
                $patient = $query->fetch();
                return $patient;
            }
        } catch(\PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function setEditMedicijn($id){ //Edits a medicijn
        $this->currentMedicijn = $id;
    }
    public function logOut(){ //Clears session
        session_unset();
        session_destroy();    
    }
    public function addMedicijn($naam, $werking, $bijwerking, $prijs){ //Create a new medicijn
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
    public function deleteMedicijn($id){ //Deletes a medicijn
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
    public function editMedicijn($id, $naam, $werking, $bijwerking, $prijs){ //Edits a medicijn
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
    public function getUser($email, $password){
        $this->connectDB();
        $encryptedpassword = hash('sha256', $password); //Encrypt gegeven wachtwoord
        $query = $this->database->prepare ("SELECT * FROM `artsen` WHERE `email` = :email");
        $query->bindParam(":email", $email);
        $result = $query->execute();
            
        if($result){ //If a email matches given email
            $query->setFetchMode(\PDO::FETCH_CLASS,Arts::class);
            $patient = $query->fetch();

            if($patient){
                if($encryptedpassword == $patient->getWachtwoord()){ //Check if password is correct
                    $_SESSION['id'] = $patient->getId();
                    $_SESSION['user'] = $patient->getNaam();
                    $_SESSION['functie'] = $patient->getFunctie();
                    $_SESSION['role'] = $patient->getRole();
                    header("Refresh:0"); //Refreshes site clears incorrecte login error
                } else {
                    echo "Incorrect login gegevens";
                }
            }
        }
    }
}