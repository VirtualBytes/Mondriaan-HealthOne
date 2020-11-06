<?php
include_once 'View/Head.php';
include_once 'View/Nav.php';

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
            <button type="submit" class="p-2 list-group-item list-group-item-action active" name="med-page" id="add-med"><i class="fas fa-file-medical"></i> add-med</button>
        </form>

         <div id="content-add-medi" class="animate__animated animate__fadeIn">
            <h1>Voeg nieuwe medicijn toe:</h1>
            <form class="medicijn-form" action="" method="POST">
                <div class="form-group">
                    <label for="naam">Naam:</label>
                    <input type="text" class="form-control" id="naam" name="naam" placeholder="naam" required="required">
                </div>
                <div class="form-group">
                    <label for="werking">Werking:</label>
                    <input type="text" class="form-control" id ="werking" name="werking" placeholder="werking" required="required">
                </div>
                <div class="form-group">
                    <label for="bijwerking">Bijwerking:</label>
                    <input type="text" class="form-control" id ="bijwerking" name="bijwerking" placeholder="bijwerking" required="required">
                </div>
                <div class="form-group">
                    <label for="prijs">Prijs:</label>
                    <input type="number" class="form-control" id ="prijs" name="prijs" placeholder="prijs" step="any" required="required">
                </div>
                <button type="submit" class="btn btn-primary" name="add-medicijn">Add-Medicijn</button>
            </form>

        </div>
    </div>
    ';

include_once 'View/Scripts.php';