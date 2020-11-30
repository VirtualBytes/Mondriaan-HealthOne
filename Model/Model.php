<?php

namespace Model;

include_once("View/View.php");
include_once("Model/User.php");
include_once("Model/Medicijn.php");
include_once("Model/Recept.php");
include_once("Model/Patient.php");
include_once("Model/Arts.php");

session_start([ //Expire cookies after 1 day
    'cookie_lifetime' => 86400,
]);

class Model{
    private $currentMedicijn;
    private $currentRecept;

    public function connectDB(){ //Make connection to database
        try {
            $this->database = new \PDO("mysql:host=localhost;dbname=HealthOne", "root", "");
            $this->database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getMedicijnen(){ //Returns all medicijnen as a class
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
            $query->bindParam(':currentMedicijn',  $getCurrentMedicijn, \PDO::PARAM_INT);
            $result = $query->execute();

            if($result){ //If a email matches given email
                $query->setFetchMode(\PDO::FETCH_CLASS,Medicijn::class);
                $patient = $query->fetch();
                return $patient; //Returns the medicijn die ge edit word
            }
        } catch(\PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getEditedRecept(){ //Gets a single recept that matches the one being edited.
        $this->connectDB();
        try {
            $getCurrentRecept = $this->currentRecept; //here give current recept
            $query = $this->database->prepare ("SELECT * FROM recepten WHERE recept_id=:currentRecept");
            $query->bindParam(':currentRecept',  $getCurrentRecept, \PDO::PARAM_INT);
            $result = $query->execute();

            if($result){ //If a email matches given email
                $query->setFetchMode(\PDO::FETCH_CLASS,Recept::class);
                $patient = $query->fetch();
                return $patient; //Returns the recept die ge edit word
            }
        } catch(\PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function setEditMedicijn($id){ //Sets current editing medicijn
        $this->currentMedicijn = $id;
    }

    public function setEditRecept($id){ //Sets current editing recept
        $this->currentRecept = $id;
    }

    public function logOut(){ //Clears session
        session_unset();
        session_destroy();    
    }

    public function addMedicijn($naam, $werking, $bijwerking, $prijs){ //Create a new medicijn
        $this->connectDB();
        try{
            $query = $this->database->prepare ("INSERT INTO `medicijnen` (`id`,`naam`,`werking`,`bijwerking`,`prijs`) VALUES(NULL, :naam, :werking, :bijwerking, :prijs);");
            $query->bindParam(":naam", $naam, \PDO::PARAM_STR);
            $query->bindParam(":werking", $werking, \PDO::PARAM_STR);
            $query->bindParam(":bijwerking", $bijwerking, \PDO::PARAM_STR);
            $query->bindParam(":prijs", $prijs, \PDO::PARAM_STR);
            $query->execute();
        } catch(\PDOException $e){
            echo"Error: ".$e->getMessage();
        }
    }

    public function addRecept($med_id, $patient_id, $hoeveelheid){ //Create a new recept
        $this->connectDB();
        try{
            $query = $this->database->prepare ("INSERT INTO `recepten` (`recept_id`,`med_id`,`patient_id`,`hoeveelheid`) VALUES(NULL, :med_id, :patient_id, :hoeveelheid);");
            $query->bindParam(":med_id", $med_id, \PDO::PARAM_INT);
            $query->bindParam(":patient_id", $patient_id, \PDO::PARAM_INT);
            $query->bindParam(":hoeveelheid", $hoeveelheid, \PDO::PARAM_INT);
            $query->execute();
        } catch(\PDOException $e){
            echo"Error: ".$e->getMessage();
        }
    }

    public function deleteMedicijn($id){ //Deletes a medicijn
        $this->connectDB();
        try{
            $query = $this->database->prepare ("DELETE FROM `medicijnen` WHERE id=:id");
            $query->bindParam(":id", $id);
            $query->execute();
        } catch(\PDOException $e){
            echo"Error: ".$e->getMessage();
        }
    }

    public function deleteRecept($id){ //Deletes a medicijn
        $this->connectDB();
        try{
            $query = $this->database->prepare ("DELETE FROM `recepten` WHERE recept_id=:id");
            $query->bindParam(":id", $id);
            $query->execute();
        } catch(\PDOException $e){
            echo"Error: ".$e->getMessage();
        }
    }

    public function editMedicijn($id, $naam, $werking, $bijwerking, $prijs){ //Edits a medicijn
        $this->connectDB();
        try{
            $query = $this->database->prepare ("UPDATE `medicijnen` SET `naam` = :naam, `werking` = :werking, `bijwerking` = :bijwerking, `prijs` = :prijs WHERE `id` = :id");
            $query->bindParam(":id", $id, \PDO::PARAM_STR);
            $query->bindParam(":naam", $naam, \PDO::PARAM_STR);
            $query->bindParam(":werking", $werking, \PDO::PARAM_STR);
            $query->bindParam(":bijwerking",$bijwerking, \PDO::PARAM_STR);
            $query->bindParam(":prijs",$prijs, \PDO::PARAM_STR);
            $query->execute();
        } catch(\PDOException $e){
            echo"Error: ".$e->getMessage();
        }
    }

    public function editRecept($recept_id, $med_id, $patient_id, $hoeveelheid){ //Edits a recept
        $this->connectDB();
        try{
            $query = $this->database->prepare ("UPDATE `recepten` SET `recept_id` = :recept_id, `med_id` = :med_id, `patient_id` = :patient_id, `hoeveelheid` = :hoeveelheid WHERE `recept_id` = :recept_id");
            $query->bindParam(":recept_id", $recept_id, \PDO::PARAM_INT);
            $query->bindParam(":med_id", $med_id, \PDO::PARAM_INT);
            $query->bindParam(":patient_id", $patient_id, \PDO::PARAM_INT);
            $query->bindParam(":hoeveelheid", $hoeveelheid, \PDO::PARAM_INT);
            $query->execute();
        } catch(\PDOException $e){
            echo"Error: ".$e->getMessage();
        }
    }
    
    public function getUser($email, $password){
        $this->connectDB();
        $encryptedpassword = hash('sha256', $password); //Encrypt gegeven wachtwoord
        //$query = $this->database->prepare ("SELECT * FROM `users` WHERE `email` = :email JOIN `artsen`");
        $query = $this->database->prepare ("SELECT * FROM users AS u 
        LEFT OUTER JOIN artsen AS arts ON u.id = arts.user_id 
        WHERE `email` = :email");

        $query->bindParam(":email", $email, \PDO::PARAM_STR);
        $result = $query->execute();

        if($result){ //If a email matches given email
            $query->setFetchMode(\PDO::FETCH_CLASS,Arts::class);
            $patient = $query->fetch();

            if(!$patient){
                echo "Incorrect login gegevens";
            }
            if($patient){
                if($encryptedpassword == $patient->__get('wachtwoord')){ //Check if password is correct
                    $_SESSION['id'] = $patient->__get('id');
                    $_SESSION['user'] = $patient->__get('volnaam');
                    $_SESSION['functie'] = $patient->__get('functie');
                    $_SESSION['role'] = $patient->__get('role');
                    header("Refresh:0"); //Refreshes site clears incorrecte login error
                } else {
                    echo "Incorrect login gegevens";
                }
            }
        }
    }

    public function getRecepten(){ //Returns all medicijnen as a class
        $this->connectDB();
        try{
            $query = $this->database->query ("SELECT * FROM recepten AS recept
            JOIN medicijnen AS med ON recept.med_id = med.id
            JOIN patienten AS patient ON recept.patient_id = patient.user_id
            JOIN users AS user ON recept.patient_id = user.id");

            if($query){
                $result = $query->fetchAll(\PDO::FETCH_CLASS,Recept::class);
                return $result;
            }
        } catch(\PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
	
	public function getPatienten(){ //Returns all medicijnen as a class
        $this->connectDB();
        try{
            $query = $this->database->query("SELECT * FROM patienten AS patient
            LEFT OUTER JOIN users AS user ON patient.user_id = user.id");
        
            if($query){
                $result = $query->fetchAll(\PDO::FETCH_CLASS,Arts::class);
                return $result;
            }
        } catch(\PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
}