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

    public static function carregarVeiculos(int $usuID)
    {
        $sql = 'SELECT * FROM veiculos_tb WHERE veiUsuID = :veiUsuID ORDER BY veiSituacao';
        $conn = Conexao::getConexao()->prepare($sql);
        $conn->execute(array('veiUsuID' => $usuID));
        $result = $conn->fetchAll();

        return $result;
    }

    public static function getSituacao(int $veiSituacao)
    {
        $situacao = '';

        switch($veiSituacao)
        {
            case 1:
                $situacao = 'Ativo';
                break;
            case 2:
                $situacao = 'Inativo';
                break;
        }

        return $situacao;
    }

}