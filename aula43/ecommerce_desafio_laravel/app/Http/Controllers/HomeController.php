<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return response()->json([
            "mensagem" => "Bem vindo a API Laravel",
            "endpoints" => [
                "clientes" => [
                    "GET" => "/api/clientes",
                    "GET " => "/api/clientes/{id}",
                    "POST" => [
                        "endpoint" => "/api/clientes/criar",
                        "body" => [
                            "nome" => "??",
                            "telefone" => "??",
                            "email" => "??",
                            "endereco" => "??"
                        ]
                    ],
                    "PUT" => [
                        "endpoint" => "/api/clientes/{id}/alterar",
                        "body" => [
                            "nome" => "??",
                            "telefone" => "??",
                            "email" => "??",
                            "endereco" => "??"
                        ]
                    ],
                    "DELETE" => "/api/clientes/{id}/excluir",
                ],
                "pedidos" => "/api/pedidos",
            ]
        ]);
    }
}
