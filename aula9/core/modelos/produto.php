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

    public static function buscarPorCodigo($codigo){
        foreach(self::$lista as $produto){
            if($produto->codigo == $codigo){
                return $produto;
            }
        }
        return null;
    }

    private static $lista = [];
}