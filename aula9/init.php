<?php

require "Entidade/Carro.php";
require "Db/Interface/IDado.php";
require "Db/Dao/MemoriaDao.php";
require "Db/Dao/JsonDao.php";
require "Servico/CarroServico.php";

use Db\Dao\MemoriaDao;
use Db\Dao\JsonDao;
use Entidade\Carro;
use Servico\CarroServico;

$toro = new Carro();
$toro->nome = "Toro";
$toro->marca = "Fiat";

// $dao = new MemoriaDao();
// $dao->salvar($toro);

CarroServico::salvar($toro);


foreach(CarroServico::todos() as $carro){
    echo "Carro: $carro->nome";
}