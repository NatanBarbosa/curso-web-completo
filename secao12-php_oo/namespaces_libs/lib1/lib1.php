<?php

namespace A; //definição para diferenciar essas classes

class Cliente implements CadastroInterface{ //implementar interfaces de outros namespaces
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