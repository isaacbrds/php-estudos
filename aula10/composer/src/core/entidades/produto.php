<?php

namespace Isaac\Composer\Core\Entidades;

class Produto{
    public $codigo;
    public $nome;
    public $descricao;
    public $preco;
    public $quantidade;

    public function __construct($_codigo = 0, $_nome = "", $_descricao = "", $_preco = 0.0, $_quantidade = 0){
        $this->codigo = $_codigo;
        $this->nome = $_nome;
        $this->descricao = $_descricao;
        $this->preco = $_preco;
        $this->quantidade = $_quantidade;
    }
}