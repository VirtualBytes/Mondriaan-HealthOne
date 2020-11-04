<?php


namespace View;
use Model\Model;
include_once("Model/Arts.php");

class View{
    public $currentPage;
    
    public function __construct(Model $model){
        $this->model = $model;
    }

    public function viewLoginForm(){
        if(empty($_SESSION['user'])){
            include_once 'View/Pages/Login.php';
        }
    }
    public function viewHomePage(){
        if(!empty($_SESSION['user']) && $this->currentPage == NULL){
            $this->currentPage = "Home";
            include 'View/Pages/Home.php';
        }
    }
    public function viewMedicijnen(){
        if(!empty($_SESSION['user']) && $_SESSION['role'] <= 3 && $_SESSION['role'] == !NULL && $this->currentPage == "Medicijnen"){
            include 'View/Pages/Medicijnen.php';
        }
    }
    public function viewAddMedicijn(){
        if(!empty($_SESSION['user']) && $_SESSION['role'] <= 3 && $_SESSION['role'] == !NULL && $this->currentPage == "AddMedicijn"){
            include 'View/Pages/AddMedicijn.php';
        }
    }
    public function viewEditMedicijn(){
        if(!empty($_SESSION['user']) && $_SESSION['role'] <= 3 && $_SESSION['role'] == !NULL && $this->currentPage == "editMedicijn"){
            include 'View/Pages/EditMedicijn.php';
        }
    }
}