<?php
include_once 'View/Head.php';
include_once 'View/Nav.php';

echo '
    <div id="login-background">
        <div class="login-page">
            <div class="form">
                <form class="login-form animate__animated animate__backInUp" action="" method="POST">
                    <div class="form-group">
                        <label for="E-mail" style="font-size: 1.2vw;"><i class="fas fa-envelope"></i> E-mail</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" required="required" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="password" style="font-size: 1.2vw;"><i class="fas fa-key"></i> Password</label>
                        <input type="password" class="form-control" id ="password" name="password" placeholder="**********" required="required">
                    </div>
                    <button type="submit" class="btn btn-primary" name="Log-in">Log in</button>
                </form>
            </div>
        </div>
    </div>
    ';

include_once 'View/Scripts.php';