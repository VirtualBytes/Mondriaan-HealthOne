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

        } else if (isset($_POST['home'])){
            $this->view->currentPage = "";
            $this->view->viewHomePage();

        } else if(isset($_POST['medicijnen'])){
            $this->view->currentPage = "Medicijnen";
            $this->view->viewMedicijnen();

        } else if(isset($_POST['recepten'])){
            $this->view->currentPage = "Recepten";
            $this->view->viewRecepten();

        } else if(isset($_POST['med-page'])){
            $this->view->currentPage = "AddMedicijn";
            $this->view->viewAddMedicijn();

        } else if(isset($_POST['recept-page'])){
            $this->view->currentPage = "AddRecepten";
            $this->view->viewAddRecept();

        } else if(isset($_POST['edit-med'])){
            $this->view->currentPage = "editMedicijn";
            $id = filter_input(INPUT_POST, 'id'); //Get patient ID zodat medicijn gedit kan worden
            $this->model->setEditMedicijn($id);
            $this->view->viewEditMedicijn();

        } else if(isset($_POST['edit-recept'])){
            $this->view->currentPage = "editRecept";
            $id = filter_input(INPUT_POST, 'id'); //Get patient ID zodat medicijn gedit kan worden
            $this->model->setEditRecept($id);
            $this->view->viewEditRecept();

        } else if(isset($_POST['publish-edit-medi'])){
            $id = filter_input(INPUT_POST, 'id'); //Get ID to edit medicine from selection
            $naam = filter_input(INPUT_POST, 'naam');   
            $werking = filter_input(INPUT_POST, 'werking');
            $bijwerking = filter_input(INPUT_POST, 'bijwerking');
            $prijs = filter_input(INPUT_POST, 'prijs');
            $this->model->editMedicijn($id, $naam, $werking, $bijwerking, $prijs);
            $this->view->currentPage = "Medicijnen";
            $this->view->viewMedicijnen();

        } else if(isset($_POST['publish-edit-recept'])){
            $recept_id = filter_input(INPUT_POST, 'recept_id'); //Get ID to edit medicine from selection
            $med_id = filter_input(INPUT_POST, 'med_id');   
            $patient_id = filter_input(INPUT_POST, 'patient_id');
            $hoeveelheid = filter_input(INPUT_POST, 'hoeveelheid');
            $this->model->editRecept($recept_id, $med_id, $patient_id, $hoeveelheid);
            $this->view->currentPage = "Recepten";
            $this->view->viewRecepten();

        } else if(isset($_POST['add-medicijn'])){
            $naam = filter_input(INPUT_POST, 'naam');
            $werking = filter_input(INPUT_POST, 'werking');
            $bijwerking = filter_input(INPUT_POST, 'bijwerking');
            $prijs = filter_input(INPUT_POST, 'prijs');
            $this->model->addMedicijn($naam, $werking, $bijwerking, $prijs);
            $this->view->currentPage = "Medicijnen";
            $this->view->viewMedicijnen();
            
        } else if(isset($_POST['add-recept'])){
            $med_id = filter_input(INPUT_POST, 'med_id');
            $patient_id = filter_input(INPUT_POST, 'patient_id');
            $hoeveelheid = filter_input(INPUT_POST, 'hoeveelheid');
            $this->model->addRecept($med_id, $patient_id, $hoeveelheid);
            $this->view->currentPage = "Recepten";
            $this->view->viewRecepten();
            
        } else if(isset($_POST['delete-med'])){
            $id = filter_input(INPUT_POST, 'id');
            $this->model->deleteMedicijn($id);
            $this->view->currentPage = "Medicijnen";
            $this->view->viewMedicijnen();

        } else if(isset($_POST['delete-recept'])){
            $id = filter_input(INPUT_POST, 'id');
            $this->model->deleteRecept($id);
            $this->view->currentPage = "Recepten";
            $this->view->viewRecepten();

        } else if(isset($_POST['add-recept'])){
            $naam = filter_input(INPUT_POST, 'naam');
            $werking = filter_input(INPUT_POST, 'werking');
            $bijwerking = filter_input(INPUT_POST, 'bijwerking');
            $prijs = filter_input(INPUT_POST, 'prijs');
            $this->model->addMedicijn($naam, $werking, $bijwerking, $prijs);
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