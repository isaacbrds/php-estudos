<?php

namespace Isaac\EcommerceDesafio\Config;
use Isaac\EcommerceDesafio\Controllers\ClientesController;
use Slim\App;

class Routes{
    public static function render(App $app){
        $app->get('/', [ClientesController::class, 'index']);
        //$app->get('/', ClientesController::class . 'get');
    }
}
          