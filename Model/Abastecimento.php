<?php

namespace Model;

class Abastecimento
{
    public string $tabels = 'abastecimentos_tb';

    private array $abastecimento = array(
        'abaID' => 0,
        'abaUsuID' => 0, 
        'abaPlaca' => '',
        'abaDataHora' => '',
        'abaCombustivel' => 0,
        'abaQuantidade' => 0.00,
        'abaValor' => 0.00,
        'abaKm' => 0,
        'abaPagamento' => 0,
        'abaObservacao' => ''
    );



}