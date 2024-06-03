<?php

namespace Isaac\EcommerceDesafio\Models;

class Cliente{
    public $id;
    public $nome;
    public $email;
    public $telefone;
    public $endereco;

    public function __construct($_id=0, $_nome = '',  $_email = '', $_telefone = '', $_endereco = '') {
        $this->id = $_id;
        $this->nome = $_nome;
        $this->email = $_email;
        $this->telefone = $_telefone;
        $this->endereco = $_endereco;
    }
}
