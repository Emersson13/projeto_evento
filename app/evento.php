<?php
date_default_timezone_set("America/Sao_Paulo");// Alterando o fuso horário do servidor

$nomeEvento = $_POST["nomeEvento"];
$dataEvento = $_POST["dataEvento"];

echo "O {$nomeEvento} vai acontecer na data {$dataEvento}";

echo "<hr>";

// MOSTRANDO VETORES DE FORMA COMPLETA
//print_r($_POST);
var_dump($_POST);

function validaData($data){

    $dataEvento = new DateTime($data);// Esta classe precisa de uma data no padrão americano para funcionar
    $dataAtual = new DateTime("now");// estamos pegando a data atual
    echo $dataEvento->format("d/m/Y");// mostrando a data no padrão brasileiro
    echo "<br> A data de hoje é: ";
    print_r($dataAtual);

    if($dataEvento > $dataAtual){
        echo "<p>Data do evento cadastrado com sucesso!</p>";
    }
    else{
        echo "<p>A data do evento não pode ser igual ou anterior à data atual</p>";
    }
}
validaData($dataEvento);