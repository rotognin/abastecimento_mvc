<?php

namespace Controller;

class relatorioController extends Controller
{
    public static function relPadraoAction()
    {
        parent::viewAction('relPadrao');
    }

    public static function relPadraoListarAction($post, $get)
    {
        parent::viewAction('relPadraoListar');
    }

    /*
    public static function relVeiculoAction()
    {
        parent::viewAction('relVeiculo');
    }

    public static function relCombustivel()
    {
        parent::viewAction('relCombustivel');
    }

    public static function relPagamento()
    {
        parent::viewAction('relPagamento');
    }
    */
}