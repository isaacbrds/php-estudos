<?php

class Produto{
    public $codigo;
    public $nome;
    public $descricao;
    public $quantidade;

    public function __construct(){
        
    }

    public function adicionar(){
        $this->codigo = count(self::$lista) + 1;
        self::$lista[] = $this;
    }

    public static function getLista(){
       return self::$lista;
    }

    private static $lista = [];
}