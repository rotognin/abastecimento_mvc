<?php

namespace Validacoes;

class Calculos
{
    public static function valorUnitario(float $valorTotal, float $quantidade)
    {
        return number_format($valorTotal / $quantidade, 2, '.', '');
    }
}