<?php
namespace Entidade;

class Carro{
    public $id;
    public $nome;
    public $marca;

    public function __construct($id=0, $nome="", $marca=""){
        $this->id = $id;
        $this->nome = $nome;
        $this->marca = $marca;
    }
}