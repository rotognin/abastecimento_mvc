<?php

namespace Model;

class Veiculo
{
    /**
     * Retorna um array vazio com os campos da tabela de veículos
     */
    public static function getArray()
    {
        return array(
            'veiID' => 0,
            'veiUsuID' => $_SESSION['usuID'],
            'veiPlaca' => '',
            'veiMarca' => '',
            'veiModelo' => '',
            'veiDescricao' => '',
            'veiAno' => 0,
            'veiSituacao' => 1
        );
    }

    /**
     * Realizar a validação dos dados
     */
    public static function validar($veiculo)
    {
        if ($veiculo['veiPlaca'] == ''){
            $_SESSION['mensagem'] = 'A Placa deve ser preenchida.';
            return false;
        }

        if ($veiculo['veiMarca'] == ''){
            $_SESSION['mensagem'] = 'A Marca deve ser informada.';
            return false;
        }

        if ($veiculo['veiModelo'] == ''){
            $_SESSION['mensagem'] = 'O Modelo deve ser informado.';
            return false;
        }

        if ($veiculo['veiAno'] == 0){
            $_SESSION['mensagem'] = 'O Ano deve ser informado.';
            return false;
        }

        return true;
    }

    /**
     * Carrega veículos de um usuário
     */
    public static function carregarVeiculos(int $usuID)
    {
        $sql = 'SELECT * FROM veiculos_tb WHERE veiUsuID = :veiUsuID ORDER BY veiSituacao ASC';
        $conn = Conexao::getConexao()->prepare($sql);
        $conn->execute(array('veiUsuID' => $usuID));
        $result = $conn->fetchAll();

        return $result;
    }

    /**
     * Carrega um veículo em específico
     */
    public static function carregarVeiculoUnico(int $veiID)
    {
        $sql = 'SELECT * FROM veiculos_tb WHERE veiID = :veiID';
        $conn = Conexao::getConexao()->prepare($sql);
        $conn->execute(array('veiID' => $veiID));
        $result = $conn->fetchAll();

        if (empty($result)) {
            return false;
        }

        return $result[0];
    }

    public static function gravar(array $veiculo)
    {
        $sql = 'INSERT INTO veiculos_tb (' .
                'veiUsuID, veiPlaca, veiMarca, veiModelo, veiDescricao, veiAno, veiSituacao) ' .
                'VALUES (:veiUsuID, :veiPlaca, :veiMarca, :veiModelo, :veiDescricao, :veiAno, :veiSituacao)';
        $conn = Conexao::getConexao()->prepare($sql);
        return $conn->execute(array(
            'veiUsuID'     => $veiculo['veiUsuID'],
            'veiPlaca'     => strtoupper($veiculo['veiPlaca']),
            'veiMarca'     => strtoupper($veiculo['veiMarca']),
            'veiModelo'    => strtoupper($veiculo['veiModelo']),
            'veiDescricao' => strtoupper($veiculo['veiDescricao']),
            'veiAno'       => $veiculo['veiAno'],
            'veiSituacao'  => $veiculo['veiSituacao']
        ));
    }

    public static function atualizar(array $veiculo)
    {
        $sql = 'UPDATE veiculos_tb SET veiPlaca = :veiPlaca, ' .
               'veiMarca = :veiMarca, veiModelo = :veiModelo, veiDescricao = :veiDescricao, ' .
               'veiAno = :veiAno, veiSituacao = :veiSituacao ' .
               'WHERE veiID = :veiID';
        $conn = Conexao::getConexao()->prepare($sql);
        return $conn->execute(array(
            'veiPlaca'     => strtoupper($veiculo['veiPlaca']),
            'veiMarca'     => strtoupper($veiculo['veiMarca']),
            'veiModelo'    => strtoupper($veiculo['veiModelo']),
            'veiDescricao' => strtoupper($veiculo['veiDescricao']),
            'veiAno'       => $veiculo['veiAno'],
            'veiSituacao'  => $veiculo['veiSituacao'],
            'veiID'        => $veiculo['veiID']
        ));
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