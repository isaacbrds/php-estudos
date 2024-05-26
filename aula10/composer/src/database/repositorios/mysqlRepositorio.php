<?php

namespace Isaac\Composer\Database\Repositorios;

use Isaac\Composer\Database\Interfaces\IDados;
use Isaac\Composer\Medoo\Medoo;



class MysqlRepositorio implements IDados{

    public function __construct() {
        $this->database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'estoque',
            'server' => 'localhost',
            'username' => 'root',
            'password' => 'root'
        ]);
    }

    public function salvar($script_sql){
        $this->database->query($script_sql);
    }

    public function todos($query){
        return $this->database->query($query)->fetchAll();
    }

}