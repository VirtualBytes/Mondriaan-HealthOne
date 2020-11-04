<?php
echo '
    <div id="nav" class="navbar-header"> 
        <nav class="navbar navbar-light bg-dark">
            <a class="navbar-brand" style="color:white;" href="">HealthOne</a>
            ';

            if(!empty($_SESSION['user'])){
                echo '
                    <span class="navbar-text" style="color:white;">
                        Ingelogd als: '.$_SESSION['user']." [".$_SESSION['functie']."]".'
                    </span>
                ';
            } else {
                echo `Not logged in`;
            }
            
            echo '
        </nav>
    </div>
    ';