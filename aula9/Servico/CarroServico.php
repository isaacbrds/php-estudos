<?php

namespace Servico;

use Entidade\Carro;
use Db\Dao\JsonDao;

class CarroServico{
    const ARQUIVO = "carros.json";
    private static $dao;

    public static function dao() {
        return new JsonDao(CarroServico::ARQUIVO);
    }


    public static function salvar(Carro $carro){
        self::dao()->salvar($carro);
    }

    public static function todos(): array{
        $dados = self::dao()->todos();
        $carros = [];
        
        foreach($dados as $item){
            $carros[] = new Carro($item->id, $item->nome, $item->marca);
        }

        return $carros;
    }
}