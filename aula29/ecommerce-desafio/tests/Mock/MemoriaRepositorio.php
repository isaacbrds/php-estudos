<?php

namespace Tests\Mock;
use Isaac\EcommerceDesafio\Repositorios\Interfaces\IRepositorio;

class MemoriaRepositorio implements IRepositorio{
    private static $lista = [];

    public function salvar($obj){
        if (isset($obj->id) && $obj->id != "" && $obj->id != 0) {
            // Procura pelo cliente existente com o ID fornecido
            foreach (MemoriaRepositorio::$lista as $index => $clienteExistente) {
                if ($clienteExistente->id == $obj->id) {
                    // Atualiza o cliente existente
                    MemoriaRepositorio::$lista[$index] = $obj;
                    return;
                }
            }
        } else {
            // Define um novo ID se não estiver definido
            $obj->id = time();
        }

        // Adiciona o novo cliente à lista
        MemoriaRepositorio::$lista[] = $obj;
    }

    public function buscar($params=[], $pagina = 1, $totalPagina = 5){
        return MemoriaRepositorio::$lista;
    }

    public function buscarPorId($id){
        foreach(MemoriaRepositorio::$lista as $item){
            if($item->id == $id){
                return $item;
            } 
        }
        return null;
    }

    public function excluirPorId($id){
        MemoriaRepositorio::$lista = array_filter(MemoriaRepositorio::$lista, function($item) use ($id) {
            return $item->id !== $id;
        });
    }


}