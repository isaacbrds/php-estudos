<?php
namespace Db\Dao;


use Db\Interface\IDado;

class MemoriaDao implements IDado{
    public function todos(){
        return $this->lista;
    }

    public function salvar($obj){
        $this->lista[] = $obj;
    }

    private $lista = [];
}
