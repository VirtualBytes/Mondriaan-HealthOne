<?php
include_once 'View/Components/Head.php';
include_once 'View/Components/Nav.php';

echo '
    <div id="page-grid">
        <form id="side-nav" action="" method="POST">
            <button type="submit" class="p-2 list-group-item list-group-item-action active" name="home"><i class="fas fa-home"></i> Home</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="patienten"><i class="fas fa-address-card"></i> Patienten</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="apotheken"><i class="fas fa-clinic-medical"></i> Apotheken</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="medicijnen"><i class="fas fa-prescription-bottle-alt"></i> Medicijnen</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="recepten"><i class="fas fa-file-medical"></i> Recepten</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="contact"><i class="fas fa-envelope"></i> Contact</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="log-uit" id="log-uit"><i class="fas fa-sign-out-alt"></i></button>
        </form>
        

        <div id="content-dashboard">
            <div class="card-deck">
                <div class="card">
                    <img class="card-img-top" src="Images/NewMed.png" alt="Card image cap">
                    <div class="card-body">
                            <h5 class="card-title">Maak een nieuwe medicijn aan</h5>
                            <p class="card-text">1. Ga naar Medicijnen. <br> 2. Klik op "add-med" in de navigatie. <br> 3. Voer gegevens in en klik op "Add-Medicijn".</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="Images/DelMed.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Delete een medicijn</h5>
                        <p class="card-text">1. Ga naar Medicijnen. <br> 2. Klik op de prullenbak naast de medicijn die je wilt deleten.</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="Images/WijzigMed.png" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">Wijzig medicijn</h5>
                        <p class="card-text">1. Ga naar Medicijnen. <br> 2. Klik op de pen en papier naast de medicijn die je wilt editen. <br> 3. Voer wijziging in en klik op "Stuur wijziging". </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';

include_once 'View/Components/Scripts.php';