<?php
require __DIR__ . '/../vendor/autoload.php';


use Slim\Factory\AppFactory;
use Tuupola\Middleware\JwtAuthentication;

use Isaac\EcommerceDesafio\Config\TokenJwt;
use Isaac\EcommerceDesafio\Config\Routes;
// Cria a aplicação Slim
$app = AppFactory::create();
$app->addBodyParsingMiddleware();
// Adiciona uma rota de exemplo
// $app->get('/', function (Request $request, Response $response, $args) {
//     $response->getBody()->write("<h1>Hello, world!</h1>");
//     return $response;
// });

// Configuração do middleware JWT
$app->add(new JwtAuthentication([
    "path"=>["/clientes", "/pedidos"],
    "secret" => TokenJwt::get(), // Alterar para uma chave segura e privada
    "attribute" => "decoded_token_data",
    "secure" => false, // Definir como true em produção para usar HTTPS
    "algorithm" => ["HS256"],
    "relaxed" => ["localhost"],
    "error" => function ($response, $arguments) {
        $data["messagem"] = "API precisa de autenticação - {$arguments["message"]}";
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        return $response;
    }
]));
Routes::render($app);

$app->add(function ($request, $handler){
    $response = $handler->handle($request);
    
    return $response
    ->withHeader('Access-Control-Allow-Origin', '*') // Pode ser restrito a domínios específicos, se necessário
    ->withHeader('Access-Control-Allow-Headers', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

// Executa a aplicação
$app->run();
