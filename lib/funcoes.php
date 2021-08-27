<?php

/**
 * Se o valor for verdadeiro, retorna a string $sim, caso
 * contrário retorna a string $nao.
 */
function verdade(bool $valor, string $sim, string $nao)
{
    return ($valor) ? $sim : $nao;
}