<?php
session_start();// Iremos iniciar uma sessão no php
require_once("../classes/Evento.php");
require_once("../model/EventoDAO.php");

$meuEvento = new Evento();
$meuEventoDAO = new EventoDAO();

$_SESSION["mensagem"] = $meuEvento->inicio($_POST, $_FILES['banner']);
if($_SESSION["mensagem"]["status"]){
    $meuEventoDAO->inserir($meuEvento);
}
//header("Location:../view/CadastroView.php");// Redirecionando o usuário para a página CadastroView.php
//die();

echo"<pre>";
    print_r($meuEventoDAO->consultar());
echo "</pre>";

/*
print_r($_POST);
echo"<hr>";
print_r($_FILES);
*/

