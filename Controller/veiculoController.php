<?php

namespace Controller;

use Model;

/**
 * Essa classe está herdando o Controller original para poder chamar
 * as views de lá, e não duplicar as chamadas.
 */

class veiculoController extends Controller
{
    public static function cadVeiculoAction(array $post, array $get)
    {
        // Será chamada a tela de formulário de veículo
        // Se no POST vier um ID, será para editar o veículo
        $veiID = (isset($post['veiID'])) ? $post['veiID'] : 0;

        if ($veiID > 0){
            if (!Model\Veiculo::veiculoUsuario($veiID)){
                $_SESSION['mensagem'] = 'A placa não pertence ao seu usuário.';
                parent::viewAction('veiculos');
                return;
            }
        }

        $_SESSION['veiID'] = $veiID;

        parent::viewAction('cadVeiculo');
    }

    private static function preencherArray(array $post)
    {
        $veiculo = Model\Veiculo::getArray();

        foreach($veiculo as $campo => $valor)
        {
            $veiculo[$campo] = $post[$campo];
        }

        return $veiculo;
    }

    public static function atualizarVeiculoAction(array $post, array $get)
    {
        $veiculo = self::preencherArray($post);

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

    public static function gravarVeiculoAction(array $post, array $get)
    {
        $post['veiID'] = 0;
        $veiculo = self::preencherArray($post);

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