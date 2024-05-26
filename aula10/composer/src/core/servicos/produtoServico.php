<?php

namespace Isaac\Composer\Core\Servicos;

use Isaac\Composer\Core\Entidades\Produto;
use Isaac\Composer\Database\Repositorios\MysqlRepositorio;

class ProdutoServico {
    public function __construct(){
        $this->repo = new MysqlRepositorio();
    }
    
    private $repo;

    public static function salvar(Produto $produto){
        $query = "INSERT INTO PRODUTOS(nome, descricao, preco, quantidade) 
        VALUES(
            {$this->produto->nome},
            {$this->produto->descricao},
            {$this->produto->preco},
            {$this->produto->quantidade},
        )";

        $repo->salvar($query);
    }

    public static function todos(): array {
        $query = "SELECT * FROM PRODUTOS";
        $dados = $repo->todos($query);

        $produtos = [];
        foreach($dados as $dado){
            $produtos[] =  new Produto($dado["codigo"], 
                                        $dado["nome"], 
                                        $dado["descricao"], 
                                        $dado["preco"], 
                                        $dado["quantidade"]);
        }

        return $produtos;
    }

    public function buscaPorCodigo(int $codigo){
        $query = "SELECT * FROM PRODUTOS WHERE codigo = {$codigo}";
        $dados = $this->repo->todos($query);

        if (count($dados) < 1) return null;
        
        $dado = $dados[0];
        
        return new Produto($dado["codigo"], 
                            $dado["nome"], 
                            $dado["descricao"], 
                            $dado["preco"], 
                            $dado["quantidade"]);
    }

    private function removeAspas($entrada){
        return str_ireplace("'","", strval($entrada));
    }
}