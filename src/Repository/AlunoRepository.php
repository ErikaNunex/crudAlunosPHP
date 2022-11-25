<?php
declare(strict_types=1);
namespace App\Repository;

use App\Connection\DatabasesConnection;
use App\Model\Aluno;
use PDO;

class AlunoRepository implements RepositoryInterface
{
    public const TABLE = 'tb_alunos';
    public PDO $conexao;

    public function __construct()
    {
        $this->conexao = DatabasesConnection::abrirConexao();
    }

    public function buscarTodos():iterable
    {
        
        $sql = 'SELECT * FROM '. self::TABLE;
        $query = $this->conexao->query($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, Aluno::class);
    }
    public function buscarUm(string $id):object
    {
        $sql= "SELECT * FROM ".self::TABLE." WHERE id='{$id}'";
        $query = $this->conexao->query($sql);
        $query->execute();
        return $query->fetchObject(Aluno::class);
    }
    public function inserir(object $dados):object
    {   
        $matricula = date('Ymds').substr($dados->cpf, -2);
        $sql= "INSERT INTO ".self::TABLE." (nome,email,cpf,matricula,status,dataNascimento,genero) ".
        "VALUES('{$dados->nome}','{$dados->email}','{$dados->cpf}','{$matricula}','1','{$dados->nascimento}','$dados->genero');";
        $this->conexao->query($sql);
        return $dados;
    }
    public function atualizar(object $dados, string $id): object
    {
        return $dados;
    }
    public function excluir(string $id):void
    {
        $sql="DELETE FROM ".self::TABLE." WHERE id='{$id}'";
        $query= $this->conexao->query($sql);
        $query->execute();
    }
}