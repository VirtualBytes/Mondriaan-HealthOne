<?php
include_once 'View/Head.php';
include_once 'View/Nav.php';
include_once("Model/Model.php");

$model = new Model\Model();
$medicijnen = $this->model->getMedicijnen();

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
            <input type="submit" class="list-group-item list-group-item-action" name="med-page" id="add-med" value="add-med"/>
        </form>

        <div id="content"> 
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Naam</th>
                    <th scope="col">Werking</th>
                    <th scope="col">Bijwerking</th>
                    <th scope="col">Prijs</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                    </tr>
                </thead>
            <tbody>
            ';

            foreach($medicijnen as $med){
                echo "
                <tr>
                    <th scope=\"row\">".$med->getId()."</th> 
                    <td>".$med->getNaam()."</td> 
                    <td>".$med->getWerking()."</td> 
                    <td>".$med->getBijwerking()."</td> 
                    <td>€".$med->getPrijs()."</td> 
                    <td> 
                        <form method=\"POST\" action=\"\"> 
                            <input type=\"number\" class=\"d-none\" name=\"id\" value=\"".$med->getId()."\"> 
                            <input type=\"submit\" id=\"delete-med\" name=\"delete-med\" value=\"❌\"/>
                        </form> 
                    </td>
                    <td> 
                        <form method=\"POST\" action=\"\"> 
                            <input type=\"number\" class=\"d-none\" name=\"id\" value=\"".$med->getId()."\"> 
                            <input type=\"text\" class=\"d-none\" name=\"naam\" value=\"".$med->getNaam()."\"> 
                            <input type=\"text\" class=\"d-none\" name=\"werking\" value=\"".$med->getWerking()."\"> 
                            <input type=\"text\" class=\"d-none\" name=\"bijwerking\" value=\"".$med->getBijwerking()."\"> 
                            <input type=\"number\" class=\"d-none\" name=\"bijwerking\" step=\"any\" value=\"".$med->getPrijs()."\"> 
                            <input type=\"submit\" id=\"edit-med\" name=\"edit-med\" value=\"✏️\"/>
                        </form> 
                    </td>
                </tr>";
            }
            
            echo '
            </tbody>
            </table>
        </div>
    </div>
    ';

include_once 'View/Scripts.php';