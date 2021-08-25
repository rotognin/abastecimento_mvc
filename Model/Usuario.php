<?php

namespace Model;

class Usuario
{
    public string $tabela = 'usuarios_tb';

    private array $usuario = array(
        'usuID'       => 0,
        'usuNome'     => '',
        'usuLogin'    => '',
        'usuSenha'    => '',
        'usuSituacao' => 0
    );

    public static function carregar(int $usuID)
    {
        if (is_nan($usuID) || $usuID == 0){
            $_SESSION['mensagem'] = 'Carregamento incorreto: [Usuario - Carregar - ' . $usuID . ']';
            return false;
        }

        $sql = 'SELECT * FROM usuarios_tb WHERE usuID = :usuID';
        $preparado = Conexao::getConexao()->prepare($sql);
        $preparado->execute(array('usuID' => $usuID));
        $resultado = $preparado->fetchAll();

        if (empty($resultado)){
            return false;
        }

        return $resultado[0];
    }

    public static function verificarLogin(string $usuLogin, string $usuSenha){
        $sql = 'SELECT * FROM usuarios_tb WHERE usuLogin = :usuLogin';
        $preparado = Conexao::getConexao()->prepare($sql);
        $preparado->execute(array('usuLogin' => $usuLogin));
        $resultado = $preparado->fetchAll();

        if (empty($resultado)){
            return false;
        }

        $usuSenhaSha1 = sha1($usuSenha);

        if ($usuSenhaSha1 != $resultado[0]['usuSenha']){
            return false;
        }

        return $resultado[0];
    }

    






}