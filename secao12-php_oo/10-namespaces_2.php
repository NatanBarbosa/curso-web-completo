<?php
/*
Geralmente as bibliotecas em php
já vem com namespaces pré definidos
e você só precisa plica-los em sua
aplicação para não haver conflitos

simulando: lib1 e lib2 são as bibliotecas
com seus respectivos namespaces
*/

#incluindo os códigos da biblioteca 1
require "./namespaces_libs/lib1/lib1.php";

#incluindo os códigos da biblioteca 2
require "./namespaces_libs/lib2/lib2.php";

//Apenas importa classes e interfaces

use B\Cliente; //agora a classe cliente do namespace B(lib 2) faz parte desse script

$b = new Cliente;
print_r($b);
echo '<br>' . $b->__get('nome');

echo '<hr>';
//---------------------------------------


use A\Cliente as Comprador;
//aqui eu dei um aplelido para que eu possa usar essa classe do namespace B em outra instância
//sem dar conflito porcausa de nomes iguais (cliente)

$a = new Comprador;
print_r($a);
echo '<br>' . $a->__get('nome');
