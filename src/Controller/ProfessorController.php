<?php

declare(strict_types=1);
namespace App\Controller;

use App\Repository\ProfessorRepository;

class ProfessorController extends AbstractController 
{
   public function listar():void
    {
        $rep = new ProfessorRepository;
        $professores = $rep->buscarTodos();
       $this->render('professor/listarProfessor',[
        'professores'=>$professores
       ]);
    }
    public function cadastrar():void
    {
        $this->render('professor/cadastrarProfessor');
    }
    public function excluir():void
    {
        $id = $_GET['id'];
        $rep =new ProfessorRepository;
        $rep->excluir($id);
        $this->render('professor/excluirProfessor',);
    }
    public function editar():void
    {
        $this->render('professor/editarProfessor');
    }
}
