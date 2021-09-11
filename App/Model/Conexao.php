<?php

namespace App\Model;

class Conexao
{
    private static $conn = NULL;

    static function getConexao()
    {
        if (is_null(self::$conn)){
            self::$conn = new \PDO('mysql:host=localhost;dbname=abastecimento_db;charset=UTF8', 'root', '');
        }

        return self::$conn;
    }
}