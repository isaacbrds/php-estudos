<?php
require __DIR__ . '/../vendor/autoload.php';


use Slim\Factory\AppFactory;


use Isaac\EcommerceDesafio\Config\Routes;

// Cria a aplicação Slim
$app = AppFactory::create();

// Adiciona uma rota de exemplo
// $app->get('/', function (Request $request, Response $response, $args) {
//     $response->getBody()->write("<h1>Hello, world!</h1>");
//     return $response;
// });

Routes::render($app);

// Executa a aplicação
$app->run();
