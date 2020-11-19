<?php
include_once 'View/Components/Head.php';
include_once 'View/Components/Nav.php';

$model = new Model\Model();
$currentRecept = $this->model->getEditedRecept();
$medicijnen = $this->model->getMedicijnen();
$patienten = $this->model->getPatienten();

echo '
    <div id="page-grid">
        <form id="side-nav" action="" method="POST">
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="home"><i class="fas fa-home"></i> Home</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="patienten"><i class="fas fa-address-card"></i> Patienten</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="apotheken"><i class="fas fa-clinic-medical"></i> Apotheken</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="medicijnen"><i class="fas fa-prescription-bottle-alt"></i> Medicijnen</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="recepten"><i class="fas fa-file-medical"></i> Recepten</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="contact"><i class="fas fa-envelope"></i> Contact</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="log-uit" id="log-uit"><i class="fas fa-sign-out-alt"></i></button>
        </form>

        <div id="content-edit-medi" class="animate__animated animate__fadeIn">
            <h1>Wijzig recept ID: [ '.$currentRecept->__get('recept_id').' ]</h1>
            <form class="medicijn-form" action="" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control d-none" id="recept_id" name="recept_id" value="'.$currentRecept->__get('recept_id').'" required="required">
                </div>
                <div class="form-group">
                    <label for="med_id">Medicijn: current [ '.$currentRecept->__get('recept_id').' ]</label>
                    <select class="form-control" id="med_id" name="med_id">';

                    foreach ($medicijnen as $med) {
                        echo '<option value="'.$med->__get('id').'" '.($med->__get("id") === $currentRecept->__get("med_id") ? 'selected' : '').'>'.$med->__get('naam').'</option>';
                    }

                    echo '
                    </select>
                </div>
                <div class="form-group">
                    <label for="patient_id">Patient:</label>
                    <select class="form-control" id="patient_id" name="patient_id"">';

                    foreach ($patienten as $pat) {
                        echo '<option value="'.$pat->__get('id').'" '.($pat->__get("id") === $currentRecept->__get("patient_id") ? 'selected' : '').'>'.$pat->__get('volnaam').'</option>';
                    }

                    echo '
                    </select>
                </div>
                <div class="form-group">
                    <label for="hoeveelheid">Hoeveelheid:</label>
                    <input type="number" class="form-control" id ="hoeveelheid" name="hoeveelheid" placeholder="hoeveelheid" value="'.$currentRecept->__get("hoeveelheid").'" required="required">
                </div>
                <button type="submit" id="submit-medicijn-wijziging" class="btn btn-primary" name="publish-edit-recept">Stuur wijziging</button>
            </form>

        </div>
    </div>
    ';

include_once 'View/Components/Scripts.php';