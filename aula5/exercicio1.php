<?php

$profissionais = [];
$contador = 0;
$opcao = 0;  // Inicialize a variável $opcao

while ($opcao != 2) {
    echo("Digite a opção desejada \n 
    1 - Cadastrar Profissional \n 
    2 - Sair \n");

    $opcao = trim(fgets(STDIN));  // Utilize trim para remover a nova linha

    switch ($opcao) {
        case '1':
            echo "Digite o nome do profissional: ";
            $nome = trim(fgets(STDIN));  // Utilize trim para remover a nova linha

            echo "Digite o cargo do profissional: ";
            $cargo = trim(fgets(STDIN));  // Utilize trim para remover a nova linha

            echo "Digite o salário do profissional: ";
            $salario = trim(fgets(STDIN));  // Utilize trim para remover a nova linha

            $profissionais[$contador] = ["nome" => $nome, "cargo" => $cargo, "salario" => $salario];
            $contador++;
            break;
        case '2':
            echo "Saindo tchau!!\n";
            break;
        default:
            echo "Opção inválida, por favor, tente novamente.\n";
            break;
    }
}

echo "================ Relatório =======================\n";
foreach ($profissionais as $profissional) {
    echo str_pad($profissional['nome'], 20) .
        str_pad($profissional['cargo'], 25) .
        "R$ " . number_format($profissional['salario'], 2, ',', '.') . "\n";
}
echo "=================================================\n";
