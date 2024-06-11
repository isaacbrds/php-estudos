<?php
namespace Isaac\EcommerceDesafio\Repositorios\Interfaces;

interface IRepositorio{
    public function salvar($obj);
    public function buscar($params=[], $pagina=1, $totalPagina = 5);
    public function buscarPorId($id);
    public function excluirPorId($id);
}