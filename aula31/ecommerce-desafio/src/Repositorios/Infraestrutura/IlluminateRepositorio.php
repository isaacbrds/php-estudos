<?php

namespace Isaac\EcommerceDesafio\Repositorios\Infraestrutura;


use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Query\Builder as QueryBuilder;

class IlluminateRepositorio {

    private $capsule;
    private static $instancia;

    private function __construct() {
        $this->capsule = new Capsule();

        $this->capsule->addConnection([
            'driver'=>'mysql',
            'host'=>'localhost',
            'database'=>'desafio_php_clientes',
            'username'=>'root',
            'password'=>'123456',
            'charset' =>'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'=> '',
        ]);

        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
    }


    public static function instancia(){
        if (self::$instancia === null) {
            
            self::$instancia = new IlluminateRepositorio();
            
        }

        return self::$instancia->capsule;
    }

    
}


