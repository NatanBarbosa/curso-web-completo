<?php

	class CustomException extends Exception{
		//criando meu próprio objeto excessão apartir do nativo do php

		private $erro = '';

		public function __construct($erro){
			$this->erro = $erro;
		}

		public function exibirErroCustomizado(){
			//customizando o erro
			echo '<div style="border: 1px solid black; padding: 15px; background-color: red; color: white;">';
				echo $this->erro;
			echo '</div>';
		}
	}

	try{

		throw new CustomException('Esse é um erro de teste'); //criando e passando um parâmetro para o construtor do objeto

	} catch (CustomException $e){
		$e->exibirErroCustomizado(); //acessando o método que exibe o erro	
	}

#Resumindo, classes de erro
//Error -> lançamento de erros internos do php
//Exception -> lançamento de erros propositais
//classe customizada -> lançamento de erros propositais e viados