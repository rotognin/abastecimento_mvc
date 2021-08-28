<?php

namespace Controller;

use Model;

/**
 * Essa classe está herdando o Controller original para poder chamar
 * as views de lá, e não duplicar as chamadas.
 */

class veiculoController extends Controller
{
    public static function cadVeiculoAction($post, $get)
    {
        // Será chamada a tela de formulário de veículo
        // Se no POST vier um ID, será para editar o veículo
        $veiID = (isset($post['veiID'])) ? $post['veiID'] : 0;
        $_SESSION['veiID'] = $veiID;
        parent::viewAction('cadVeiculo');
    }

    public static function atualizarVeiculoAction($post, $get)
    {
        $veiculo = Model\Veiculo::getArray();

        foreach($veiculo as $campo => $valor)
        {
            $veiculo[$campo] = $post[$campo];
        }

        if (!Model\Veiculo::validar($veiculo)){
            parent::vireAction('cadVeiculo');
            return;
        }
        
        if (Model\Veiculo::atualizar($veiculo)){
            parent::viewAction('veiculos');
        } else {
            $_SESSION['mensagem'] = 'Veículo não atualizado.';
            parent::viewAction('cadVeiculo');
        }
    }

    public static function gravarVeiculoAction($post, $get)
    {
        $veiculo = Model\Veiculo::getArray();
        $post['veiID'] = 0;

        foreach ($veiculo as $campo => $valor)
        {
            $veiculo[$campo] = $post[$campo];
        }

        if (!Model\Veiculo::validar($veiculo)) {
            parent::viewAction('cadVeiculo');
            return;
        }

        if (Model\Veiculo::gravar($veiculo)) {
            parent::viewAction('veiculos');
        } else {
            $_SESSION['mensagem'] = 'Veículo não gravado.';
            parent::viewAction('cadVeiculo');
        }

    }
}