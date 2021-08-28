<?php

namespace Controller;

use Model;

class abastecimentoController extends Controller
{
    public static function cadAbastecimentoAction()
    {
        parent::viewAction('cadAbastecimento');
    }

    public static function gravarAbastecimentoAction(array $post, array $get)
    {
        $abastecimento = Model\Abastecimento::getArray();

        $abastecimento['abaID']          = 0;
        $abastecimento['abaDataHora']    = $post['abaData'] . ' ' . $post['abaHora'] . ':00';
        $abastecimento['abaPlaca']       = $post['abaPlaca'];
        $abastecimento['abaCombustivel'] = $post['abaCombustivel'];
        $abastecimento['abaQuantidade']  = $post['abaQuantidade'];
        $abastecimento['abaValor']       = $post['abaValor'];
        $abastecimento['abaKm']          = $post['abaKm'];
        $abastecimento['abaPagamento']   = $post['abaPagamento'];
        $abastecimento['abaObservacao']  = $post['abaObservacao'];

        //var_dump($abastecimento);

        if (Model\Abastecimento::gravar($abastecimento)) {
            parent::viewAction('menu');
        } else {
            $_SESSION['mensagem'] = 'Abastecimento não gravado.';
            parent::viewAction('cadAbastecimento');
        }
    }
}