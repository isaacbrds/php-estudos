<?php
require "core/modelos/produto.php";
require "tela/cores.php";
require "tela/display.php";
require "core/mensagens.php";
require "core/acoes_sobre_produto.php";
require "core/menu.php";

// init();

$p = new Produto();

$p->nome = "Manga";
$p->descricao = "Manga da boa";
$p->quantidade = 10;

$p->adicionar();
$produtos = $p->getLista();
foreach($produtos as $produto){
    echo $produto->codigo;
}