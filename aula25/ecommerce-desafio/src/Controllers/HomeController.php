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
        $cliente = new Cliente();
        $cliente->nome = "Zé Cueca Maroto";

        return RenderView::render($response,['cliente'=>$cliente]);
    }
}
