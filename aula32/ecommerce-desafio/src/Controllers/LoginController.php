<?php

namespace Isaac\EcommerceDesafio\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Isaac\EcommerceDesafio\Models\Cliente;
use Isaac\EcommerceDesafio\Views\RenderView;
use Isaac\EcommerceDesafio\Config\TokenJwt;
use Firebase\JWT\JWT;

class LoginController
{
    public function logar(Request $request, Response $response, array $args): Response
    {
        $response = $response->withHeader('Content-Type', 'application/json');

        $data = $request->getParsedBody();
        if($data['email'] != "adm@teste.com"){
            $response->getBody()->write(json_encode([
                'mensagem' => 'E-mail ou senha inválida',
            ]));
            return $response->withStatus(400);
        }
        
        if($data['senha'] != "123456"){
            $response->getBody()->write(json_encode([
                'mensagem' => 'E-mail ou senha inválida',
            ]));
            return $response->withStatus(400);
        }

        $payload = [
            'iat' => time(),
            'exp' => time() + 60 * 60,
            'username' => "adm@teste.com",
        ];

        $token = JWT::encode($payload, TokenJwt::get(), "HS256");


        $response->getBody()->write(json_encode([
            'jwt_token' => $token,
        ]));

        return $response->withStatus(200);
        
    }
}
