<?php
require("classeLogin/login.php");
require("apiLogin/login.php");

use classeLogin\Login;
use apiLogin\Login as apiLogin;// criando um apelido para o namespace

$meuLogin = new \classeLogin\Login();//1a forma de utilizar namespace
$meuLogin->verificaLogin();

$meuLogin2 = new Login();//2a forma de usar namespace

$meuLogin3 = new apiLogin();