<?php

namespace Controller;

use Model;

class veiculoController extends Controller
{
    public static function cadVeiculoAction($post, $get)
    {
        // Será chamada a tela de formulário de veículo
        // Se no POST vier um ID, será para editar
        $veiID = (isset($post['veiID'])) ? $post['veiID'] : 0;
        $_SESSION['veiID'] = $veiID;
        parent::viewAction('cadVeiculo');
    }

    
}