<?php

session_start();

use Controller as Controller;

require 'lib' . DIRECTORY_SEPARATOR . 'definicoes.php';

$action = (isset($_GET['action'])) ? $_GET['action'] . 'Action' : 'homeAction';
$control = (isset($_GET['control'])) ? $_GET['control'] : '';
$funcao = 'Controller\\' . $control . 'Controller::' . $action;

call_user_func($funcao, $_POST, $_GET);

//Controller\Controller::$action($_POST, $_GET); - chamada antiga, para um único controlador