<?php

namespace Isaac\EcommerceDesafio\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Isaac\EcommerceDesafio\Models\Cliente;
use Isaac\EcommerceDesafio\Views\RenderView;

class HomeController
{
    public function index(Request $request, Response $response, array $args): Response
    {
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode([
            'mensagem' => 'Bem vindo a api do nosso Sistema!',
            "endpoints" => [
                "Clientes" => "/clientes"
            ]
        ]));
        $response->withStatus(200);
        return $response;
    }
}
