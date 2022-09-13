<?php
/*
Usado quanado há conflitos de nomes(classes, funções, nome de var, etc.) iguais em nossa aplicação
quando por exemplo adicionamos uma bibliteca com códigos e
nomes já predefinidos

*/
//Exemplo prático

#biblioteca 

namespace A; //definição para diferenciar essas classes

class Cliente implements \B\CadastroInterface{ //implementar interfaces de outros namespaces
	public $nome = 'Jorge';

	public function __construct(){
		echo "<pre>";
		print_r(get_class_methods($this));
		echo "</pre>";
	}

	public function __get($attr){
		return $this->$attr;
	}

	public function salvar(){
		echo 'salvar';
	}

	public function remover(){
		echo 'remover';
	}
}

interface CadastroInterface{
	public function salvar();
}


#nossa aplicação

namespace B;

class Cliente implements \A\CadastroInterface{ //implementar interfaces de outros namespaces
	public $nome = 'Jamilton';

	public function __construct(){
		echo "<pre>";
		print_r(get_class_methods($this));
		echo "</pre>";
	}

	public function __get($attr){
		return $this->$attr;
	}

	public function remover(){
		echo 'remover';
	}

	public function salvar(){
		echo 'salvar';
	}
}

interface CadastroInterface{
	public function remover();
}

//Qual classe será ultilizada de acordo com o namespace 
$a = new \A\Cliente();
$b = new \B\Cliente();

print_r($a);
echo '<br>' . $a->__get('nome');

echo '<hr>';

print_r($b);
echo '<br>' . $b->__get('nome');
