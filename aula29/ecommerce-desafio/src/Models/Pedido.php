<?php

namespace Isaac\EcommerceDesafio\Models;

class Pedido{
    public $id;
    public $clienteId;
    public $valorTotal;
    public $descricao;
    public $data;

    public function __construct($_id=0, $_clienteId = 0,  $_valorTotal = 0, $_descricao = '', $_data = '') {
        $this->id = $_id;
        $this->clienteId = $_clienteId;
        $this->valorTotal = $_valorTotal;
        $this->descricao = $_descricao;
        $this->data = $_data == null ? new \Datetime() : $_data;
    }
}
