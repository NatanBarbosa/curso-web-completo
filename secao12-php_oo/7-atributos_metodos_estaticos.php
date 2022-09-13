<?php
	class Exemplo {
	 	public static $atributo1 = 'Eu sou um atributo estático';
	 	public $atributo2 = 'Eu sou um atributo normal';

	 	public static function metodo1(){
	 		//echo $this->atributo2; se não instanciada uma identidade não é possivel acessar operador de contexto para atributos não estáticos
	 		echo 'Eu sou um método estático';
	 	}

	 	public function metodo2(){
	 		echo 'Eu sou um método normal';
	 	}
	}

	$x = new Exemplo(); //com atributos e métodos estáticos não precisa fazer essa nova instância, mas dá...

	#Acessando os atributos/métodos estáticos (:: -> operador de resolução de escopo)
	echo Exemplo::$atributo1 . '<br>';
	Exemplo::metodo1();
	echo '<hr>';

	//echo Exemplo::$atributo2; não da pra acessar o atributo não estático com esse operador
	echo Exemplo::metodo2(); //da pra acessar o atributo não estático com esse operador(mas nãó é recomendado)

	echo '<hr>';


	#Testando acesso com os atributos estaticos e não estáticos
	//echo $x->$atributo1; não da pra usar atributo estático assim
	echo $x::$atributo1 . '<br>';
	echo $x->atributo2;

	echo '<hr>';


	#testando acesso com métodos estáticos e não estáticos


?>