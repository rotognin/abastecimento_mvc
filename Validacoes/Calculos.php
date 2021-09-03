<?php

namespace Validacoes;

class Calculos
{
    public function valorUnitario(float $valorTotal, float $quantidade)
    {
        return number_format($valorTotal / $quantidade, 2, '.', '');
    }
}