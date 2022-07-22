<?php
class Pessoa{
    public $nome;
    public $idade;
    public $peso;

    // O método construtor irá inicializar os atributos com valors dinâmicos 
    function __construct($nome, $idade, $peso){
        $this->nome = $nome;
        $this->idade = $idade;
        $this->peso = $peso;
    }
    
    function falar($texto){
        echo $texto;
    }
}

$pessoa1 = new Pessoa("Bruno", 18, 70);
$pessoa1->falar("Fazendo aquele curso maroto");// acessando o método falar da classe
echo "<br>";

echo "Meu nome é {$pessoa1->nome} minha idade é {$pessoa1->idade} <hr>";

$pessoa2 = new Pessoa("Maria", 23, 65.5);

echo "Olá me chamo {$pessoa2->nome} e meu peso é {$pessoa2->peso}";