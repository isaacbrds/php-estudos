<?php 
namespace Isaac\EcommerceDesafio\Servicos;

use Isaac\EcommerceDesafio\Repositorios\MysqlRepositorio;
use Isaac\EcommerceDesafio\Models\Cliente;
use Isaac\EcommerceDesafio\Servicos\ErroDeValidacao\VazioValidacao;
use Isaac\EcommerceDesafio\Servicos\ErroDeValidacao\FormatoValidacao;

class ClienteServico{
    public function __construct($driver) {
        $this->driver = $driver;
    }

    private $driver;

    public function salvar(Cliente $cliente){
        if(!isset($cliente->nome) || $cliente->nome == '') 
            throw new VazioValidacao('Nome não pode ser vazio');

        if(!isset($cliente->telefone) || $cliente->telefone == '') 
            throw new VazioValidacao('Telefone não pode ser vazio');
        
        if (!preg_match('/^\(\d{2}\) \d{4,5}-\d{4}$/', $cliente->telefone)) 
            throw new FormatoValidacao("O formato do telefone precisa ser (00) 00000-0000 ou (00) 0000-0000");

        $this->driver->salvar($cliente);
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

