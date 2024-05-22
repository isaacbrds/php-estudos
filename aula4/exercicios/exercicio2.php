<?php


while($opcao != 5){
    echo("digite a opção desejada \n 
    1 - Cadastrar Aluno \n 
    2 - Alterar Aluno \n 
    3 - Excluir Aluno \n 
    4 - Mostrar todos os Alunos \n 
    5 - Sair \n");
    
    $opcao = fgets(STDIN);

    switch ($opcao) {
        case '1':
            echo "Cadastrando \t";
            break;
        
        case '2':
            echo "Alterando \t";
            break;
        
        case '3':
            echo "Excluindo \t";
            break;
        
        case '4':
            echo "Mostrando \t";
            break;
        default:
            echo "Saindo tchau!!";
            break;
    }
}


