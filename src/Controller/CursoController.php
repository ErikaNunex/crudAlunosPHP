<?php

declare(strict_types=1);
namespace App\Controller;

class CursoController extends AbstractController
{
   public function listar():void
    {
       $this->render('curso/listarCurso');
    }
    public function cadastrar():void
    {
        $this->render('curso/cadastrarCurso');
    }
    public function excluir():void
    {
        $this->render('curso/excluirCurso');
    }
    public function editar():void
    {
        $this->render('curso/editarCurso');
    }
}