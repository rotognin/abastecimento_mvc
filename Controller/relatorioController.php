<?php

namespace Controller;

class relatorioController extends Controller
{
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
}