<?php
declare(strict_types=1);
namespace App\Repository;

use PDO;
use App\Connection\DatabasesConnection;
use App\Model\Professor;

class ProfessorRepository implements RepositoryInterface
{
    public const TABLE = 'tb_professores';
    public function buscarTodos():iterable
    {

    $conexao = DatabasesConnection::abrirConexao();

    $sql = 'SELECT * FROM '. self::TABLE;
    $query = $conexao->query($sql);
     $query->execute();
     return $query->fetchAll(PDO::FETCH_CLASS, Professor::class);    
    }
    public function buscarUm(string $id):object
    {
        return new \stdClass();
    }
    public function inserir(object $dados):object
    {
        return $dados;
    }
    public function atualizar(object $dados, string $id): object
    {
        return $dados;
    }
    public function excluir(string $id):void
    {
        $conexao = DatabasesConnection::abrirConexao();
        $sql = "DELETE FROM ".self::TABLE." WHERE id='{$id}'";
        $query = $conexao->query($sql);
        $query->execute();
    }
}