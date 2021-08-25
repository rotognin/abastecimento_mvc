<?php

session_start();

use Controller;

require 'lib' . DIRECTORY_SEPARATOR . 'definicoes.php';

$action = (isset($_GET['action'])) ? $_GET['action'] . 'Action' : 'homeAction';

Controller\Controller::$action($_POST, $_GET);