<?php 
namespace Isaac\EcommerceDesafio\Servicos;

use Isaac\EcommerceDesafio\Repositorios\MysqlRepositorio;
use Isaac\EcommerceDesafio\Models\Pedido;
use Isaac\EcommerceDesafio\Servicos\ErroDeValidacao\VazioValidacao;
use Isaac\EcommerceDesafio\Servicos\ErroDeValidacao\FormatoValidacao;

class PedidoServico{
    public function __construct($driver) {
        $this->driver = $driver;
    }

    private $driver;

    public function salvar(Pedido $pedido){
        if(!isset($pedido->clienteId) || $pedido->clienteId == 0) 
            throw new VazioValidacao('Cliente não pode ser vazio');

        if(!isset($pedido->valorTotal) || $pedido->valorTotal < 0) 
            throw new VazioValidacao('Valor Total não pode ser vazio');
        
        
        $this->driver->salvar($pedido);
    }

    public function buscar($params=[], $pagina=1, $totalPagina=5){
        return $this->driver->buscar($params, $pagina, $totalPagina);
    }

    public function buscarPorId($id){
        return $this->driver->buscarPorId($id);
    }

    public function excluirPorId($id){
        $this->driver->excluirPorId($id);
    }
}

