<?php
$soma_das_frutas = 0;
$nomes_das_frutas = "";
for($i = 0; $i < 4; $i++){
    echo "Digite o nome da fruta: ";
    $fruta = fgets(STDIN);
    echo "Digite o valor da fruta: ";
    $valor_fruta = fgets(STDIN);

    $soma_das_frutas += $valor_fruta;

    $nomes_das_frutas .= "$fruta, ";
}

$media = ($soma_das_frutas / 4);

echo " A média das frutas é $media";