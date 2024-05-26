<?php
namespace Isaac\Composer\Display;

class AcoesSobreProduto{
    public static function adicionarProduto() {
        limpaTela();
        $produto = new Produto();
        $produto->nome = readline(verde("Nome do produto: "));
        $produto->descricao =  readline(amarelo("Descrição do produto: "));
        $produto->quantidade = readline(azul("Quantidade em estoque: "));
        $produto->adicionar();
        mensagemComEspera("Produto adicionado com sucesso!\n");
    }
    
    public static  function realizarSaida() {
        limpaTela();
        $codigo = readline("Código do produto para saída: ");
        $produto = Produto::buscarPorCodigo($codigo);
        
        if(isset($produto)){
            $quantidadeSaida = readline("Quantidade a ser retirada: ");
            if ($produto->quantidade >= $quantidadeSaida) {
                    $produto->quantidade -= $quantidadeSaida;
                    mensagemComEspera("Saída realizada com sucesso.");
                    return;
                } else {
                    mensagemComEsperaVermelho("Estoque insuficiente.");
    
                    $opcao = continuar();
                    if($opcao == "s") realizarSaida();
    
                    return;
                }
        }else{
            mensagemComEsperaVermelho("Produto não encontrado!\n");
            $opcao = continuar();
            if($opcao == "s") realizarSaida();
        }
    }
    
    public static function listarProdutos() {
        limpaTela();
        echo verde("Código | Nome               | Descrição            | Estoque\n");
        foreach (Produto::getLista() as $produto) {
            echo str_pad($produto->codigo, 6) . ' | ' . str_pad($produto->nome, 18) . ' | ' . str_pad($produto->descricao, 20) . ' | ' . $produto->quantidade . "\n";
        }
        echo "Digite enter para sair";
        readline();
    }
}

