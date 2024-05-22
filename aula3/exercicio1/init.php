<?php 
echo "Digite seu nome: ";

$nome = fgets(STDIN);

echo "Digite o nome do produto: ";

$nome_produto = fgets(STDIN);

echo "Digite o valor do produto: ";

$valor_produto = fgets(STDIN);

echo "Digite a quantidade desejada: ";

$quantidade = fgets(STDIN);

$resultado = $valor_produto * $quantidade;

echo "digite quanto quer pagar: ";

$pagamento = fgets(STDIN);

if($pagamento > $resultado){
    $troco = $pagamento - $resultado;
    echo "aqui está seu troco";
}elseif ($pagamento == $resultado) {
    echo "tudo certo por aqui";
}else{
    echo "esta faltando dinheiro $resultado - $pagamento";
}