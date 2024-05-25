<?php

function menu() {
    echo("Digite a opção desejada \n 
    1 - Cadastrar Produto \n 
    2 - Vender Produto \n 
    3 - Listar Produtos \n 
    4 - Sair \n");


    
}

function init(){
    while(true){
        limpaTela();
        menu();
        $opcao = readline('escolha uma opção: ');
    
        switch ($opcao) {
            case '1':
                adicionarProduto();
                break;
            case '2':
                realizarSaida();
                break;
            case '3':
                listarProdutos();
                break;
            case 4:
                exit(0);
            default:
                echo "Opção inválida.\n";
        }
    }
}
