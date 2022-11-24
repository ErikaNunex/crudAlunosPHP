<?php
declare(strict_types=1);
namespace App\Connection;
use PDO;

class DatabasesConnection
{
    public static function abrirConexao(): \PDO
    {
        return new PDO("mysql:host=localhost; dbname=".DB_NAME,DB_USE, DB_PASSWORD);
    }
}