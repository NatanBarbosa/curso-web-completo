<?php

	//modelo
	class Funcionario{

		//atributos
		public $nome = null;
		public $telefone = null;
		public $numFilhos = null;
		public $cargo = null;
		public $salario = null;



		//getters e setters (overloading / sobrecarga)
		function __set($atributo, $valor){ //tem q ser escrito exatamente assim. Parâmetros ness ordem(conveção)
			$this->$atributo = $valor;
		}
		
		function __get($atributo){
			return $this->$atributo;
		}

		//métodos
		function resumirCadFunc(){
			return $this->__get('nome') . ' possui ' . $this->__get('numFilhos') . ' filho(s)' . ', é ' . $this->__get('cargo') . ' e ganha ' . $this->__get('salario') . '.Ligue para ele(a): ' . $this->__get('telefone');
		}

		function modificarNumFilhos($numfilhos){
			//afetar um atributo do objeto
			$this->numFilhos = $numfilhos;
		}

	}

	//instanciar objetos
	$y = new Funcionario();

	//settando valores(parâmetro-> aatributo q quer modificar, valor que será colocado)
	$y->__set('nome','José');
	$y->__set('numFilhos', 2);
	$y->__set('telefone', '0000-0000');
	$y->__set('cargo', 'Programador');
	$y->__set('salario', 1500);


	//pegando valores individuais (get(parâmetro -> atributo que você quer recuperar))
	//echo $y->__get('nome') . '<br>';
	//echo $y-> __get('cargo') . '<br><br>';


	//execultar métodos / acessar atributos
	echo $y->resumirCadFunc();

	echo '<hr>';

	#outro funcionario

	//instanciar objetos
	$x = new Funcionario();

	//settando valores(parâmetro-> aatributo q quer modificar, valor que será colocado)
	$x->__set('nome','Maria');
	$x->__set('numFilhos', 5);
	$x->__set('telefone', '1234-5678');
	$x->__set('cargo', 'Designer');
	$x->__set('salario', 1200);


	//pegando valores individuais (get(parâmetro -> atributo que você quer recuperar))
	//echo $x->__get('nome') . '<br>';
	//echo $x-> __get('cargo') . '<br><br>';


	//execultar métodos / acessar atributos
	echo $x->resumirCadFunc();
	



?>