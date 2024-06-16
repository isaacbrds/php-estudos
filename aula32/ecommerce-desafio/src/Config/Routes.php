<?php
namespace Isaac\EcommerceDesafio\Config;

use Slim\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpNotFoundException;
use Slim\App;
use Isaac\EcommerceDesafio\Controllers\ClientesController;
use Isaac\EcommerceDesafio\Controllers\LoginController;
use Isaac\EcommerceDesafio\Controllers\PedidosController;
use Isaac\EcommerceDesafio\Controllers\HomeController;

class Routes{
    public static function render(App $app){
        $app->get('/', [HomeController::class, 'index']);
        $app->post('/login', [LoginController::class, 'logar']);
        $app->get('/clientes', [ClientesController::class, 'index']);
        $app->delete('/clientes/{id}', [ClientesController::class, 'excluir']);
        $app->get('/clientes/{id}', [ClientesController::class, 'mostrar']);
        $app->post('/clientes', [ClientesController::class, 'criar']);
        $app->put('/clientes/{id}', [ClientesController::class, 'atualizar']);

        $app->get('/pedidos', [PedidosController::class, 'index']);
        $app->get('/pedidos/novo', [PedidosController::class, 'novo']);
        $app->get('/pedidos/{id}/excluir', [PedidosController::class, 'excluir']);
        $app->get('/pedidos/{id}/editar', [PedidosController::class, 'editar']);
        $app->post('/pedidos', [PedidosController::class, 'criar']);
        $app->post('/pedidos/{id}', [PedidosController::class, 'atualizar']);
        
        $errorMiddleware = $app->addErrorMiddleware(true, true, true);

        $errorMiddleware->setErrorHandler(
            HttpNotFoundException::class,
            function (ServerRequestInterface $request, \Throwable $exception, bool $displayErrorDetails) {
                $response = new Response();
                $response->withStatus(404);
                $response = $response->withHeader('Content-Type', 'application/json');
                $response->getBody()->write(json_encode(['mensagem' => 'O endpoint não existe']));
                return $response;
            }
        );
    }
}
          