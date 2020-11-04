<?php
use Model\Model;
include_once("Model/Model.php");
use View\View;
include_once("View/View.php");
use Controller\Controller;
include_once("Controller/Controller.php");

$model = new Model(); //Maakt een model
$view = new view($model); //Geeft de model mee aan de view zodat je hem daar kan aanroepen
$controller = new Controller($model, $view); //Geeft model en view door aan controller

$view->viewLoginForm();
$view->viewHomePage();