<?php


namespace Controller;
use Model\Model;
use View\View;

class Controller{
    private $model;
    private $view;

    public function __construct(Model $model, View $view){
        $this->model = $model;
        $this->view = $view;

        $this->updateView();
        $this->checkLogin();
    }

    public function updateView(){ //Checks what page is active and if button is clicked changes to webpage
        if(isset($_POST['log-uit'])){
            $this->view->currentPage = "";
            $this->model->logOut();

        } else if (isset($_POST['dashboard'])){
            $this->view->currentPage = "";
            $this->view->viewHomePage();

        } else if(isset($_POST['medicijnen'])){
            $this->view->currentPage = "Medicijnen";
            $this->view->viewMedicijnen();

        } else if(isset($_POST['med-page'])){
            $this->view->currentPage = "AddMedicijn";
            $this->view->viewAddMedicijn();

        } else if(isset($_POST['edit-med'])){
            $this->view->currentPage = "editMedicijn";
            $id = filter_input(INPUT_POST, 'id'); //Get patient ID zodat medicijn gedit kan worden
            $this->model->setEditMedicijn($id);
            $this->view->viewEditMedicijn();

        } else if(isset($_POST['publish-edit-medi'])){
            $id = filter_input(INPUT_POST, 'id'); //Get ID to edit medicine from selection
            $naam = filter_input(INPUT_POST, 'naam');   
            $werking = filter_input(INPUT_POST, 'werking');
            $bijwerking = filter_input(INPUT_POST, 'bijwerking');
            $prijs = filter_input(INPUT_POST, 'prijs');
            $this->model->editMedicijn($id, $naam, $werking, $bijwerking, $prijs);
            $this->view->currentPage = "Medicijnen";
            $this->view->viewMedicijnen();

        } else if(isset($_POST['add-medicijn'])){
            $naam = filter_input(INPUT_POST, 'naam');
            $werking = filter_input(INPUT_POST, 'werking');
            $bijwerking = filter_input(INPUT_POST, 'bijwerking');
            $prijs = filter_input(INPUT_POST, 'prijs');
            $this->model->addMedicijn($naam, $werking, $bijwerking, $prijs);
            $this->view->currentPage = "Medicijnen";
            $this->view->viewMedicijnen();
            
        } else if(isset($_POST['delete-med'])){
            $id = filter_input(INPUT_POST, 'id');
            $this->model->deleteMedicijn($id);
            $this->view->currentPage = "Medicijnen";
            $this->view->viewMedicijnen();
        }
    }
    public function checkLogin(){
        if(isset($_POST['Log-in'])){
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            $this->model->getUser($email, $password);
        }
    }
}