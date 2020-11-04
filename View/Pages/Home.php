<?php
include_once 'View/Head.php';
include_once 'View/Nav.php';

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

        <div id="content"> 
            Homepage
        </div>
    </div>
    ';

include_once 'View/Scripts.php';