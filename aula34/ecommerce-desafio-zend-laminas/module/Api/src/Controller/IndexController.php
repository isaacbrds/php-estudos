<?php

declare(strict_types=1);

namespace Api\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\JsonModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new JsonModel ([
            "mensagem"=> "Bem vindo a API do Zend",
            "endpoints" => [
                "clientes" => "/api/clientes",
                "pedidos" => "/api/pedidos",
            ]
            ]);
    }
}
