<?php

namespace Model;

class Abastecimento
{
    /**
     * Retorna um array com os campos do cadastro de Abastecimentos
     */
    public static function getArray()
    {
        return array(
            'abaID' => 0,
            'abaUsuID' => $_SESSION['usuID'], 
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

    public static function gravar(array $abastecimento)
    {
        $sql = 'INSERT INTO abastecimentos_tb (' .
                'abaUsuID, abaPlaca, abaDataHora, abaCombustivel, abaQuantidade, ' . 
                'abaValor, abaKm, abaPagamento, abaObservacao) ' .
                'VALUES (:abaUsuID, :abaPlaca, :abaDataHora, :abaCombustivel, ' . 
                ':abaQuantidade, :abaValor, :abaKm, :abaPagamento, :abaObservacao)';
        $conn = Conexao::getConexao()->prepare($sql);
        return $conn->execute(array(
            'abaUsuID'       => $abastecimento['abaUsuID'],
            'abaPlaca'       => strtoupper($abastecimento['abaPlaca']),
            'abaDataHora'    => $abastecimento['abaDataHora'],
            'abaCombustivel' => $abastecimento['abaCombustivel'],
            'abaQuantidade'  => $abastecimento['abaQuantidade'],
            'abaValor'       => $abastecimento['abaValor'],
            'abaKm'          => $abastecimento['abaKm'],
            'abaPagamento'   => $abastecimento['abaPagamento'],
            'abaObservacao'  => strtoupper($abastecimento['abaObservacao'])
        ));
    }




}