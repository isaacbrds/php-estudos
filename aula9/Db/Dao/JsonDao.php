<?php
namespace Db\Dao;


use Db\Interface\IDado;

class JsonDao implements IDado{
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
        $objetos = self::todos();
        $objetos[] = $obj;

        $json = json_encode($objetos, JSON_PRETTY_PRINT);
        file_put_contents($this->arquivo, $json);
    }
}
