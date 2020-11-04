<?php
include_once 'View/Head.php';
include_once 'View/Nav.php';

echo '
    <div id="page-grid">
        <div id="side-nav">
        </div>

        <div class="content">
           <form class="login-form" action="" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="required" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We\'ll never share your username or password with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id ="password" name="password" placeholder="Password" required="required">
                </div>
                <button type="submit" class="btn btn-primary" name="Log-in">Log in</button>
            </form>

            
        </div>
    </div>
    ';

include_once 'View/Scripts.php';