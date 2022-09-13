<?php
	/*
	Reutilizável -> classe pai e filho
	Manuteção -> alterações herdadas 
	*/

	class Carro extends Veiculo{ //com essa explicatação de extends as subclasses recebem os atributos/métodos das superclasses
		#atributos
		public $tetoSolar = true;

		#métodos
		function abrirTetoSolar(){
			echo 'Abrir teto solar';
		}

		function alterarPosicaoVolaando(){
			'Alterar posiçãao do volante';
		}
	}

	class Moto extends Veiculo{
		#atributos
		public $contrapesoGuidao = true;

		#métodos
		function empinar(){
			echo 'Empinar';
		}
	}

	class Veiculo{
		//classe pai que possui atributos em comum das de cima

		#atributos
		public $placa = null;
		public $cor = null;

		function __construct($placa, $cor){
			$this->placa = $placa;
			$this->cor = $cor;
		}


		#métodos
		function acelerar(){
			echo 'Acelerar';
		}

		function freiar(){
			echo 'freiar';
		}
	}

	$carro = new Carro(true, 'ABC-1234', 'Branco');
	$moto = new Moto('DEF-5678', 'Vermelha');

	//mostrar carro
	echo '<pre>';
	print_r($carro);
	echo '<pre>';

	//mostrar moto
	echo '<pre>';
	print_r($moto);
	echo '<pre>';

	echo '<hr>';

	$carro->acelerar(); //função da classe genérica herdada
	echo '<br>';
	$carro->abrirTetoSolar();

	echo '<hr>';

	$moto->freiar(); //função da classe genérica herdada
	echo '<br>';
	$moto->empinar();
?>