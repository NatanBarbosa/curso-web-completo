<?php
	
#criando uma interface

interface EquipamentoEletronicoInterface{
	//São tipo métodos obrigatórios que as classes abaixo precisam implementar
	//métodos TEM q ser públicos

	public function ligar();
	public function desligar();

	//As interfaces não implementam os métodos (abre e fecha parenteses e código...). Apenas indicam que eles devem ser implementados pelas classes
}	

//-----------------------------------------------------------------------------------------------------

class Geladeira implements EquipamentoEletronicoInterface{
	public function abrirPorta(){
		echo 'Abrir a porta';
	}

	//implementando métodos obrigatórios
	public function ligar(){
		echo 'Ligar';
	}

	public function desligar(){
		echo 'desligar';
	}
}

class Tv implements EquipamentoEletronicoInterface{
	public function trocarCanal(){
		echo 'Trocar o canal';
	}

	//implementando métodos obrigatórios
	public function ligar(){
		echo 'Ligar';
	}

	public function desligar(){
		echo 'desligar';
	}
}

$x = new Geladeira();
$y = new Tv();


//------------------//------------------//------------------//------------------//------------------//------------------//------------------//


#implementando interfaces com métodos obrigatórios
interface MamiferoInterface{
	public function respirar();
}

interface TerrestreInterface{
	public function andar();
}

interface AquaticoInterface{
	public function nadar();
}

class Humando implements MamiferoInterface, TerrestreInterface{
	//ou seja, implementa duas interfaces diferentes, e tem q ter os métodos de todas elas(no caso totaliza-se dois métodos)
	//sequencia não importa

	#métodos obrigatórios
	public function respirar(){
		echo 'andar';
	}

	public function andar(){
		echo 'respirar';
	}


	#métodos individuais
	public function conversar(){
		echo 'conversar';
	}
}

class baleia implements MamiferoInterface, AquaticoInterface{
	#métodos obrigatórios
	public function respirar(){
		echo 'Respirar';
	}

	public function nadar(){
		echo 'nadar';
	}


	#métodos individuais
	protected function esguichar(){
		echo 'esguichar';
	}
}



//------------------//------------------//------------------//------------------//------------------//------------------//------------------//


interface AnimalInterface{
	public function comer();
}

interface AveInterface extends AnimalInterface{
	//aqui ele herda as assinaturas de classe obrigatória no Animal interface
	public function voar();
}

class Papagaio implements AveInterface{
	public function voar(){
		echo 'Voando ebaaa';
	}

	public function comer(){
		echo 'Comendo ebaaa';
	}
}