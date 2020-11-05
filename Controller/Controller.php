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
            $_SESSION['CurrentMedicijnEdit'] = $id; //Bewaar ID
            $this->view->viewEditMedicijn();

        } else if(isset($_POST['publish-edit-medi'])){
            $id = $_SESSION['CurrentMedicijnEdit']; //Get ID to edit medicine from selection
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
            $this->view->currentPage = "AddMedicijn";
            $this->view->viewAddMedicijn();
            
        } else if(isset($_POST['delete-med'])){
            $id = filter_input(INPUT_POST, 'id');
            $this->model->deleteMedicijn($id);
            $this->view->currentPage = "Medicijnen";
            $this->view->viewMedicijnen();
        }
    }
    public function checkLogin(){ //Check if info matches one of artsen database
        $artsen = $this->model->getArtsen(); //Grabs info here from artsen database
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        if($username != NULL && $password != NULL){
            foreach($artsen as $data){
                if($username == $data->getEmail() && $password == $data->getWachtwoord()){
                    $_SESSION['id'] = $data->getId();
                    $_SESSION['user'] = $data->getNaam();
                    $_SESSION['functie'] = $data->getFunctie();
                    $_SESSION['role'] = $data->getRole();
                }
            }
        }
    }
}