<?php

$nomeEvento = $_POST["nomeEvento"];
$dataEvento = $_POST["dataEvento"];

echo "O {$nomeEvento} vai acontecer na data {$dataEvento}";

echo "<hr>";

// MOSTRANDO VETORES DE FORMA COMPLETA
//print_r($_POST);
var_dump($_POST);

function validaData($data){

    $dataEvento = new DateTime($data);// Esta classe precisa de uma data no padrão americano para funcionar
    echo $dataEvento->format("d/m/Y");// mostrando a data no padrão brasileiro
}
validaData($dataEvento);