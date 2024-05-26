<?php

namespace Isaac\Composer\Database\Repositorios;

use Isaac\Composer\Database\Interfaces\IDados;

class JsonRepositorio implements IDados{
    private $arquivo;
    
    public function __construct(String $_arquivo) {
        $this->arquivo = $_arquivo;
    }

    public function todos(){
        
        if(!file_exists($this->arquivo)){
            file_put_contents($this->arquivo, "[]");
        }

        $json = file_get_contents($this->arquivo);
        return json_decode($json);
        
    }

    public function salvar($obj){
        $objetos = $this->todos();
        $objetos[] = $obj;

        $json = json_encode($objetos, JSON_PRETTY_PRINT);
        file_put_contents($this->arquivo, $json);
    }
}