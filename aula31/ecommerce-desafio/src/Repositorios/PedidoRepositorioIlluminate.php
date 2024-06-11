<?php 
namespace Isaac\EcommerceDesafio\Repositorios;

use Isaac\EcommerceDesafio\Repositorios\Interfaces\IRepositorio;
use Isaac\EcommerceDesafio\Repositorios\Infraestrutura\IlluminateRepositorio;
use Isaac\EcommerceDesafio\Models\Pedido;

class PedidoRepositorioIlluminate implements IRepositorio{
    public function __construct() {
        $this->repo = IlluminateRepositorio::instancia();
    }

    private $repo;

    public function salvar($pedido)
    {
        if ($pedido->id) {
            // Atualiza o Pedido existente
            return $this->repo->table('pedidos')
                ->where('id', $pedido->id)
                ->update([
                    'cliente_id'    => $pedido->clienteId,
                    'valor_total'   => $pedido->valorTotal,
                    'descricao'     => $pedido->descricao,
                    'data'          => $pedido->data
                ]);
        } else {
            // Cria um novo Pedido
            return $this->repo->table('pedidos')
                ->insertGetId([
                    'cliente_id'    => $pedido->clienteId,
                    'valor_total'   => $pedido->valorTotal,
                    'descricao'     => $pedido->descricao,
                    'data'          => $pedido->data
                ]);
        }
    }

    public function buscar($params = [], $pagina = 1, $totalPagina = 5)
    {
        $query = $this->repo->table('pedidos');

        foreach ($params as $campo => $valor) {
            $query->where($campo, $valor);
        }
        
        $pagina = max(1, isset($pagina) ? intval($pagina) : 1);
        $offset = ($pagina - 1) * $totalPagina;

         // calculo da paginação
         $pagina = max(1, isset($pagina) ? intval($pagina) : 1);
         $offset = ($pagina - 1) * $totalPagina;
     
         // Aplicamos a limitação e o offset para a paginação
         $query = $query->limit($totalPagina)->offset($offset);
 
         $query = $query->orderBy('id', 'desc');
     
         // Executamos a consulta e retornamos os resultados
 
         $dados = $query->get();
 
         $pedidos = [];
         foreach($dados as $dado){
             $pedidos[] = $this->buildPedido($dado);
         }
 
         return $pedidos;
    }

    public function buscarPorId($id)
    {
        $dado = $this->repo->table('pedidos')
        ->where('id', $id)
        ->first();

        return $this->buildPedido($dado);
    }

    public function excluirPorId($id)
    {
        return $this->repo->table('pedidos')
                          ->where('id', $id)
                          ->delete();
    }

    private function buildPedido($dado){
        if (!$dado) return null;

        $pedido = new Pedido(
            $dado->id,
            $dado->cliente_id,
            $dado->valor_total,
            $dado->descricao,
            new \DateTime($dado->data)
        );
        return $pedido;
    }
}

