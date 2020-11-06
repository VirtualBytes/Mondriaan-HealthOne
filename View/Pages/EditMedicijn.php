<?php
include_once 'View/Head.php';
include_once 'View/Nav.php';

$model = new Model\Model();
$currentMedicijn = $this->model->getEditedMedicine();

echo '
    <div id="page-grid">
        <form id="side-nav" action="" method="POST">
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="home"><i class="fas fa-home"></i> Home</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="patienten"><i class="fas fa-address-card"></i> Patienten</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="apotheken"><i class="fas fa-clinic-medical"></i> Apotheken</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="medicijnen"><i class="fas fa-prescription-bottle-alt"></i> Medicijnen</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="medicijn-Uitschrijven"><i class="fas fa-file-medical"></i> Medicijn Uitschrijven</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="contact"><i class="fas fa-envelope"></i> Contact</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="log-uit" id="log-uit"><i class="fas fa-sign-out-alt"></i></button>
        </form>

        <div id="content-edit-medi" class="animate__animated animate__fadeIn">
            <h1>Wijzig medicijn: [ '.$currentMedicijn->__get('naam').' ]</h1>
            <form class="medicijn-form" action="" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control d-none" id="id" name="id" value="'.$currentMedicijn->__get('id').'" required="required">
                </div>
                <div class="form-group">
                    <label for="naam">Naam:</label>
                    <input type="text" class="form-control" id="naam" name="naam" value="'.$currentMedicijn->__get('naam').'" required="required">
                </div>
                <div class="form-group">
                    <label for="werking">Werking:</label>
                    <input type="text" class="form-control" id ="werking" name="werking" placeholder="werking" value="'.$currentMedicijn->__get('werking').'" rows="3" required="required">
                </div>
                <div class="form-group">
                    <label for="bijwerking">Bijwerking:</label>
                    <input type="text" class="form-control" id ="bijwerking" name="bijwerking" placeholder="bijwerking" value="'.$currentMedicijn->__get('bijwerking').'" rows="3" required="required">
                </div>
                <div class="form-group">
                    <label for="prijs">Prijs:</label>
                    <input type="number" class="form-control" id ="prijs" name="prijs" placeholder="prijs" step="any" value="'.$currentMedicijn->__get('prijs').'" required="required">
                </div>
                <button type="submit" id="submit-medicijn-wijziging" class="btn btn-primary" name="publish-edit-medi">Stuur wijziging</button>
            </form>

        </div>
    </div>
    ';

include_once 'View/Scripts.php';