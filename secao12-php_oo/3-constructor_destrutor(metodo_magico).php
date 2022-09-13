<?php

	#modelo
	class Pessoa{
		public $nome = null;

		//construtor de atributos
		function __construct($nome){ //escreve exatamente assim
			echo 'Objeto iniciado';
			$this->nome = $nome;
		}

		//destrutor de atributos
		function __destruct(){ //escreve exatamente assim
			echo 'Objeto removido';
		}


		//get
		function __get($atributo){
			return $this->$atributo;
		}


		//método normal
		function correr(){
			return $this->__get('nome') . ' está correndo';
		}
	}

	$pessoa = new Pessoa('Jorge'); //parâmetros -> __construct
	echo '<br> Nome: ' . $pessoa->__get('nome') . '<br>';
	echo $pessoa->correr() . '<br>';

	unset($pessoa);//o destruct derá chamado automaticamente nessa linha dps q o objeto for removido depropósito
	//o __destruct() tbm é chamado ao termino da interpretação do script

?>