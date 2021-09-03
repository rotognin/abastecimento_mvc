<?php

/**
 * Utilizando um tutorial em https://www.devmedia.com.br/teste-unitario-com-phpunit/41231
 */

namespace Tests;

use PHPUnit\Framework\TestCase;
use Validacoes\Calculos;

class CalculosTest extends TestCase
{
    public function testValorUnitario()
    {
        $valor = new Calculos();
        $this->assertIsString($valor->valorUnitario(2, 2,00));
    }
}
