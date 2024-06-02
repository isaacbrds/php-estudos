<?php 
namespace Isaac\EcommerceDesafio\Repositorios;

use Isaac\EcommerceDesafio\Repositorios\Interfaces\IRepositorio;
use Isaac\EcommerceDesafio\Repositorios\Infraestrutura\IlluminateRepositorio;
use Isaac\EcommerceDesafio\Models\Cliente;

class ClienteRepositorioIlluminate implements IRepositorio{
    public function __construct() {
        $this->repo = IlluminateRepositorio::instancia();
    }

    private $repo;

    public function salvar($cliente)
    {
        if ($cliente->id) {
            // Atualiza o cliente existente
            return $this->repo->table('clientes')
                ->where('id', $cliente->id)
                ->update([
                    'nome' => $cliente->nome,
                    'telefone' => $cliente->telefone,
                    'email' => $cliente->email,
                    'endereco' => $cliente->endereco
                ]);
        } else {
            // Cria um novo cliente
            return $this->repo->table('clientes')
                ->insertGetId([
                    'nome' => $cliente->nome,
                    'telefone' => $cliente->telefone,
                    'email' => $cliente->email,
                    'endereco' => $cliente->endereco
                ]);
        }
    }

    public function buscar($params = [], $pagina = 1, $totalPagina = 5)
    {
        $query = $this->repo->table('clientes');

        foreach ($params as $campo => $valor) {
            $query->where($campo, 'like', '%' . $valor . '%');
        }
        
        $pagina = max(1, isset($pagina) ? intval($pagina) : 1);
        $offset = ($pagina - 1) * $totalPagina;

        return $query->offset($offset)
                     ->limit($totalPagina)
                     ->get();
    }

    public function buscarPorId($id)
    {
        return $this->repo->table('clientes')
                          ->where('id', $id)
                          ->first();
    }

    public function excluirPorId($id)
    {
        return $this->repo->table('clientes')
                          ->where('id', $id)
                          ->delete();
    }
}

