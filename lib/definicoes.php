<?php

header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');

define('DS', DIRECTORY_SEPARATOR);
define('DIR', array('controller' => 'Controller' . DS,
                    'model'      => 'Model' . DS,
                    'view'       => 'View' . DS,
                    'home'       => 'index.php',
                    'log'        => 'log' . DS . 'log.txt'
                   )
        );

function autoload($class)
{   
    include_once($class . '.php');
}
spl_autoload_register('autoload');

require_once('funcoes.php');