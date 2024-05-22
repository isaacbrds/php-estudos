<?php

echo("Digite seu nome: ");
$nome = fgets(STDIN);

echo("Digite o produto: ");
$produto = fgets(STDIN);

echo("Digite o valor: ");
$valor = fgets(STDIN);

echo("Digite a quantidade desejada: ");
$quantidade = fgets(STDIN);

$resultado = $valor * $quantidade;
echo("Seu nome é: " . $nome. "comprou produto " . $produto . "cujo valor a pagar ficou R$ " . $resultado );
