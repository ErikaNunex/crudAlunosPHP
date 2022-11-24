<?php

declare(strict_types=1);
namespace App\Controller;
abstract class AbstractController
{
    public function render(string $view, array $dados = []):void
    {
        extract($dados);
        include_once '../views/template/header.phtml';
        
        include '../views/template/menu.phtml';
        
        include_once "../views/{$view}.phtml";

        include_once '../views/template/footer.phtml';
    }
    public function redirect(string $local):void
    {
        header('location: '.$local);
    }

}