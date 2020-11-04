<?php
include_once 'View/Head.php';
include_once 'View/Nav.php';

$model = new Model\Model();
$currentMedicijn = $this->model->getEditedMedicine();

echo '
    <div id="page-grid">
        <form id="side-nav" action="" method="POST">
            <input type="submit" class="p-2 list-group-item list-group-item-action bg-light" name="dashboard" value="Dashboard"/>
            <input type="submit" class="p-2 list-group-item list-group-item-action bg-light" name="patienten" value="Patienten"/>
            <input type="submit" class="p-2 list-group-item list-group-item-action bg-light" name="apotheken" value="Apotheken"/>
            <input type="submit" class="p-2 list-group-item list-group-item-action bg-light" name="medicijnen" value="Medicijnen"/>
            <input type="submit" class="p-2 list-group-item list-group-item-action bg-light" name="geschiedenis-Uitschrijvingen" value="Geschiedenis Uitschrijvingen"/>
            <input type="submit" class="p-2 list-group-item list-group-item-action bg-light" name="medicijn-Uitschrijven" value="Medicijn Uitschrijven"/>
            <input type="submit" class="p-2 list-group-item list-group-item-action bg-light" name="contact" value="Contact"/>
            <input type="submit" class="list-group-item list-group-item-action" name="log-uit" id="log-uit" value="Log-uit"/>
        </form>

         <div class="content">
           <form class="medicijn-form" action="" method="POST">
                <div class="form-group">
                    <label for="naam">Naam:</label>
                    <input type="text" class="form-control" id="naam" name="naam" value="'.$currentMedicijn->getNaam().'" required="required">
                </div>
                <div class="form-group">
                    <label for="werking">Werking:</label>
                    <input type="text" class="form-control" id ="werking" name="werking" placeholder="werking" value="'.$currentMedicijn->getWerking().'" rows="3" required="required">
                </div>
                <div class="form-group">
                    <label for="bijwerking">Bijwerking:</label>
                    <input type="text" class="form-control" id ="bijwerking" name="bijwerking" placeholder="bijwerking" value="'.$currentMedicijn->getBijwerking().'" rows="3" required="required">
                </div>
                <div class="form-group">
                    <label for="prijs">Prijs:</label>
                    <input type="number" class="form-control" id ="prijs" name="prijs" placeholder="prijs" step="any" value="'.$currentMedicijn->getPrijs().'" required="required">
                </div>
                <button type="submit" class="btn btn-primary" name="publish-edit-medi">Edit</button>
            </form>

        </div>
    </div>
    ';

include_once 'View/Scripts.php';