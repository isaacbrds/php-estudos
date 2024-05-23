<?php

$estoque = [];
$contador = 0;

function menu() {
    echo("Digite a opção desejada \n 
    1 - Cadastrar Produto \n 
    2 - Vender Produto \n 
    3 - Listar Produtos \n 
    4 - Sair \n");
}

function cadastrarProduto(&$estoque, &$contador) {
    echo "Digite o nome do produto: ";
    $nome = trim(fgets(STDIN));  // Utilize trim para remover a nova linha

    echo "Digite a descrição do produto: ";
    $descricao = trim(fgets(STDIN));  // Utilize trim para remover a nova linha

    echo "Digite a quantidade do produto: ";
    $quantidade = trim(fgets(STDIN));  // Utilize trim para remover a nova linha

    $estoque[$contador] = ["nome" => $nome, "descricao" => $descricao, "quantidade" => $quantidade];
    $contador++;
}

function venderProduto(&$estoque) {
    echo "Digite o nome do produto: ";
    $nome = trim(fgets(STDIN));  // Utilize trim para remover a nova linha
    
    echo "Digite a quantidade do produto desejada: ";
    $quantidade = trim(fgets(STDIN));  // Utilize trim para remover a nova linha

    $produtoEncontrado = false;
    foreach ($estoque as &$produto) {
        if ($produto['nome'] == $nome) {
            $produtoEncontrado = true;
            if ($produto['quantidade'] >= $quantidade) {
                $produto['quantidade'] -= $quantidade;
                echo "Produto vendido com sucesso!\n";
            } else {
                echo "Quantidade insuficiente desse produto.\n";
            }
            break;
        }
    }

    if (!$produtoEncontrado) {
        echo "Produto não encontrado.\n";
    }
}

function listarProdutos(&$estoque) {
    echo "================ Relatório =======================\n";
    foreach ($estoque as $produto) {
        echo str_pad($produto['nome'], 20) .
            str_pad($produto['descricao'], 25) .
            number_format($produto['quantidade'], 2) . "\n";
    }
    echo "=================================================\n";
}

while (true) {
    menu();
    $opcao = trim(fgets(STDIN));
    if ($opcao == 4) break;
    switch ($opcao) {
        case '1':
            cadastrarProduto($estoque, $contador);
            break;
        case '2':
            venderProduto($estoque);
            break;
        case '3':
            listarProdutos($estoque);
            break;
        default:
            echo "Opção inválida, por favor, tente novamente.\n";
            break;
    }
}
