<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class Calculos
{
    public static function valorUnitario(float $valorTotal, float $quantidade)
    {
        return number_format($valorTotal / $quantidade, 2, '.', '');
    }
}

class CalculosTest extends TestCase
{
    public function testValorUnitario()
    {
        self::assertIsString(Calculos::valorUnitario(2, 2,00));
    }
}
