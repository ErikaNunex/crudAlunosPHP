<?php

declare(strict_types=1);
namespace App\Controller;

use App\Model\Aluno;
use App\Repository\AlunoRepository;
use Dompdf\Dompdf;
use Exception;

class AlunoController extends AbstractController
{ 
   public function listar():void 
    {
        $rep = new AlunoRepository;
        $alunos = $rep->buscarTodos();
        $this->render('aluno/listarAluno',[
            'alunos'=>$alunos,
        ]);
    }
    public function cadastrar():void
    {
        if(true === empty($_POST)){
            $this->render('aluno/cadastrarAluno');
            return;
        }
        $aluno = new Aluno();
        $aluno ->nome = $_POST['nome'];
        $aluno ->nascimento = $_POST['nascimento'];
        $aluno ->cpf = $_POST['cpf'];
        $aluno ->email = $_POST['email'];
        $aluno ->genero = $_POST['genero'];

        $rep = new AlunoRepository();
        try{
            $rep->inserir($aluno);
        }catch(Exception $exception){
            if(true === str_contains($exception->getMessage(), 'cpf')){
                die(' ESSE CPF JÁ EXISTE');
            }
            if(true === str_contains($exception->getMessage(), 'email')){
                die('ESSE EMAIL JÁ ESTÁ CADASTRADO');
            }
            die('Houve um error');
        }
        $this->redirect('/alunos/listar');
    }
    public function excluir():void
    {
        $this->render('aluno/excluirAluno');
    }
    public function editar():void
    {
        $this->render('aluno/editarAluno');
    }
    public function gerarRelatorio():void
    {
        $hoje = date('d/m/y');
        $desing = "
        <h1>Relatotio</h1>
        <hr>
        <em>Gerado em {$hoje}<em>
        "; 
        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->loadHtml($desing);
        $dompdf->render();
        $dompdf->stream();
    }
}