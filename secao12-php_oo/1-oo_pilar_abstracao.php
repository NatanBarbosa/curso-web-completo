<?php
	/*
	Entidade -> class
	Identidade -> instancia 
	Características -> atributos
	Ações -> métodos
	*/

	//modelo
	class Funcionario{

		//atributos
		public $nome = null;
		public $telefone = null;
		public $numFilhos = null;



		//getters e setters
		#setters -> funções void, modificam
		function setNome($nome){
			$this->nome = $nome;
		}

		function setNumFilhos($numFilhos){
			$this->numFilhos = $numFilhos;
		}

		function setTelefone($telefone){
			$this->telefone = $telefone;
		}

		#getters -> funções return, retornam um valor
		function getNome(){
			return $this->nome;
		}

		function getnumFilhos(){
			return $this->numFilhos;
		}

		function getTelefone(){
			return $this->telefone;
		}



		//métodos
		function resumirCadFunc(){
			return "$this->nome possui $this->numFilhos filhos. Ligue para ele: $this->telefone";
		}

		function modificarNumFilhos($numfilhos){
			//afetar um atributo do objeto
			$this->numFilhos = $numfilhos;
		}

	}

	//instanciar objetos
	$y = new Funcionario();
	$x = new Funcionario();

	//settando valores
	$y->setNome('José');
	$y->setTelefone('4002-8922');
	$y->setNumFilhos(2);

	$x->setNome('Maria');
	$x->setTelefone('1234-5678');
	$x->setNumFilhos(0);

	//pegando valores individuais (get)
	echo $y->getNome() . '<br>';
	echo $y->getTelefone() . '<br><br>';

	echo $x->getNome() . '<br>';
	echo $x->getNumFilhos() . '<hr>';

	//execultar métodos / acessar atributos
	echo $y->resumirCadFunc() . '<br>';
	echo $x->resumirCadFunc();
	



?>