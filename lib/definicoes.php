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

$combustiveis = array(
    '1' => 'Gasolina',
    '2' => 'Etanol',
    '3' => 'Diesel',
    '4' => 'Gasolina Aditivada',
    '5' => 'Etanol Aditivado',
    '6' => 'Gás (GNV)'
);

$pagamentos = array(
    '1' => 'Dinheiro',
    '2' => 'Débito',
    '3' => 'Crédito',
    '4' => 'Convênio',
    '5' => 'PIX',
    '6' => 'Promocional'
);

function autoload($class)
{   
    include_once($class . '.php');
}
spl_autoload_register('autoload');

require_once('funcoes.php');