<?php

declare(strict_types=1);
namespace App\Model;
use DateTime;

class Aluno extends Pessoa
{
    public string $matricula;
    public DateTime $dataDeNascimento;
    public bool $status;
    public string $endereco;
    
} 