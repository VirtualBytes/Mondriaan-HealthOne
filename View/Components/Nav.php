<?php
echo '
    <div id="nav" class="navbar-header"> 
        <nav class="navbar navbar-light bg-dark">
            <a class="navbar-brand" style="color:white;" href=""><i class="fas fa-server"></i> HealthOne</a>

            ';

            if(!empty($_SESSION['user'])){
                echo '
                    <span class="navbar-text" style="color:white;">
                        <i class="fas fa-id-badge"></i> '.$_SESSION['user']; 
                        
                        if(!empty($_SESSION['functie'])){ 
                            echo '&nbsp; <i class="fas fa-user-md"></i>  '.$_SESSION['functie'].'
                    </span>
                ';}
            } else {
                echo `Not logged in`;
            }
            
            echo '
        </nav>
    </div>
    ';