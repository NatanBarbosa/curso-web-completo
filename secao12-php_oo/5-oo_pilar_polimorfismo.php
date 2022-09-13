<?php
	/*
	Métodos herdados, porém
	Sobrescrita de métodos
	*/
	class Carro extends Veiculo{ //com essa explicatação de extends as subclasses recebem os atributos/métodos das superclasses
		#atributos
		public $tetoSolar = true;

		#métodos
		function abrirTetoSolar(){
			echo 'Abrir teto solar';
		}

		function alterarPosicaoVolaando(){
			'Alterar posição do volante';
		}
	}

	class Moto extends Veiculo{
		#atributos
		public $contrapesoGuidao = true;

		#métodos
		function empinar(){
			echo 'Empinar';
		}

		function trocarMarcha(){
			//pega o método da classe pai e modifica aqui na classe filha
			//sobrescrita
			echo 'Desengatar embregem com a mão e engatar marcha com o pé <br>';
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

		function trocarMarcha(){
			echo 'Desengatar embregem com o pé e engatar marcha com a mão <br>';
		}
	}

	class Caminhao extends Veiculo{}

	$carro = new Carro(true, 'ABC-1234', 'Branco');
	$moto = new Moto('DEF-5678', 'Vermelha');
	$caminhao = new Caminhao('AAA-4444', 'coloridokkkkk');

	$carro->trocarMarcha();
	$moto->trocarMarcha(); //só a moto é a diferentona
	$caminhao->trocarMarcha();
	
?>