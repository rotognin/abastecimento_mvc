<?php

namespace Model;

class Veiculo
{
    public string $tabela = 'veiculos_tb';

    private array $veiculo = array(
        'veiID' => 0,
        'veiUsuID' => 0,
        'veiPlaca' => '',
        'veiMarca' => '',
        'veiModelo' => '',
        'veiDescricao' => '',
        'veiAno' => 0,
        'veiSituacao' => 0
    );



}