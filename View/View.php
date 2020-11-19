<?php


namespace View;
use Model\Model;
include_once("Model/Arts.php");

class View{
    public $currentPage;
    
    public function __construct(Model $model){
        $this->model = $model;
    }

    public function viewLoginForm(){ //Can always see this if not logged in
        if(empty($_SESSION['user'])){
            include_once 'View/Pages/Login.php';
        }
    }
    public function viewHomePage(){ //Can always see if user is logged in
        if(isset($_SESSION['user'])){
            if(!empty($_SESSION['user'] && $this->currentPage == NULL)){ //NULL staat voor dashboard page default altijd erop dan
                $this->currentPage = "Home";
                include 'View/Pages/Home.php';
            }
        }
    }
    public function viewMedicijnen(){ //Only able to view if logged in and has role that equals 3 or less (User rights)
        if(isset($_SESSION['user'])){
            if(!empty($_SESSION['user']) && $_SESSION['role'] <= 3 && $_SESSION['role'] == !NULL && $this->currentPage == "Medicijnen"){
                include 'View/Pages/Medicijnen.php';
            }
        }
    }
    public function viewAddMedicijn(){  //Only able to view if logged in and has role that equals 3 or less (User rights)
        if(isset($_SESSION['user'])){
            if(!empty($_SESSION['user']) && $_SESSION['role'] <= 3 && $_SESSION['role'] == !NULL && $this->currentPage == "AddMedicijn"){
                include 'View/Pages/AddMedicijn.php';
            }
        }
    }
    public function viewEditMedicijn(){ //Only able to view if logged in and has role that equals 3 or less (User rights)
        if(isset($_SESSION['user'])){
            if(!empty($_SESSION['user']) && $_SESSION['role'] <= 3 && $_SESSION['role'] == !NULL && $this->currentPage == "editMedicijn"){
                include 'View/Pages/EditMedicijn.php';
            }
        }
    }
    public function viewRecepten(){ //Only able to view if logged in and has role that equals 3 or less (User rights)
        if(isset($_SESSION['user'])){
            if(!empty($_SESSION['user']) && $_SESSION['role'] <= 3 && $_SESSION['role'] == !NULL && $this->currentPage == "Recepten"){
                include 'View/Pages/Recepten.php';
            }
        }
    }
    public function viewAddRecept(){ //Only able to view if logged in and has role that equals 3 or less (User rights)
        if(isset($_SESSION['user'])){
            if(!empty($_SESSION['user']) && $_SESSION['role'] <= 3 && $_SESSION['role'] == !NULL && $this->currentPage == "AddRecepten"){
                include 'View/Pages/AddRecept.php';
            }
        }
    }
    public function viewEditRecept(){ //Only able to view if logged in and has role that equals 3 or less (User rights)
        if(isset($_SESSION['user'])){
            if(!empty($_SESSION['user']) && $_SESSION['role'] <= 3 && $_SESSION['role'] == !NULL && $this->currentPage == "editRecept"){
                include 'View/Pages/editRecept.php';
            }
        }
    }
}