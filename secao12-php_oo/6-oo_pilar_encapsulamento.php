<?php
	/*
	Segurança -> constrole de visibilidade
	public -> disponiveis para serem acesados e modificados pela instância do objeto
	protected/private -> não é possivel acessaar atributos privados pela instância do objeto
	protected x privete -> diferença de herança
	*/

	class Pai{
		private $nome = 'Jorge';
		protected $sobrenome = 'Silva';
		public $humor = 'Feliz';

		//usando getters e setters normais
		/*public function getNome(){
			//acessar objetos privados apartir de classes públicas
			return $this->nome;
		}

		public function setNome($value){

			if(strlen($value) >= 3){
				$this->nome = $value;
			}

		}*/

		//usando métodos mágicos
		public function __get($attr){
			return $this->$attr;
		}

		public function __set($attr, $valor){
			if(strlen($valor) >= 3){
				$this->$attr = $valor;
			}
		}

		#outros métodos
		private function execultarMania(){
			echo 'Assobiar';
		}

		protected function responder(){
			echo 'oi';
		}

		public function execultarAcao(){
			//Método que execulta outros métodos públicos ou privados, através de uma regra de negócio ou sla
			$x = rand(1,10);
			if($x >=1 && $x<=8){
				$this->responder();
				echo '<br>';
			}else{
				$this->execultarMania();
				echo '<br>';
			}
		}
	}

	class Filho extends Pai{
		//Importante: atributos e métodos private não são herdados do Pai
		//Esse objeto filho herda os metodos mágicos __get() e __set()

		/*public function getAtributo($attr){
			return $this->$attr;
		}

		public function setAtributo($attr, $valor){
			$this->$attr = $valor;
		}*/

		public function __construct(){
			echo '<pre>';
			print_r(get_class_methods($this));
			echo '</pre>';
			//no processo de construção ele tem acesso aos métodos desse objeto, inclusivo os protegidos, que fora da aplicação não são visiveis
		}

		private function execultarMania(){
			//esse método não é herdado e não sofre polimorfismo, e sim é criado um novo
			echo 'Cantar';
		}

		public function x(){
			//é preciso chamar a função X para execultarMania()
			$this->execultarMania();
		}

		protected function responder(){
			//esse método é herdado e sofre polimorfismo
			echo 'Tchau!';
		}
		
	}


	$pai = new Pai();

	#Recebendo e modificando atributos
	/*
	//modificando atributos públicos
	echo $pai->humor . '<br>';
	$pai->humor = 'Triste';
	echo $pai->humor . '<hr>';

	//modificando atributos privatos através de métodos
	echo $pai->getNome() . '<br>';
	echo $pai->setNome('aaaaa');
	echo $pai->getNome();
	*/

	/*echo $pai->sobrenome;
	//ao tentar acessar esse atributo privado o php automaticamente o recupera através da função mágica __get() passando como atributo o nome. É uma inteligência a mais do php

	$pai->sobrenome = 'Damasceno';
	//ao tentar modificar esse atributo privado o php automaticamente altera o valor através da função __set('nome', 'Damasceno'). Os atributos são preenchido de acordo com a mudança feita na instância

	echo '<br>' . $pai->sobrenome;

	echo '<br><br>';

	#execultando Métodos
	$pai->execultarAcao();

	echo '<hr>';*/



	#trabalhando com o objeto filho
	$filho = new Filho();
	echo '<pre>';
	print_r($filho);
	echo '</pre>';

	/*
	//mudando atributos publicos / protegidos, através de funções
	echo $filho->getAtributo('sobrenome') . '<br>';
	$filho->setAtributo('sobrenome', 'Shakespare');
	echo $filho->getAtributo('sobrenome') . '<br>';

	echo'<hr>';

	
	//ao invez de mudar um atributo privado criar um novo atributo
	echo $filho->getAtributo('nome') . '<br>'; //não consegue
	$filho->setAtributo('nome', 'Lucas'); //cria um novo atributo publico nome

	echo '<pre>';
	print_r($filho);
	echo '<pre>';

	echo $filho->getAtributo('nome') . '<br>';
	*/



	//exibir os métodos do objeto
	/*echo '<pre>';
	print_r(get_class_methods($filho));
	echo '</pre>';*/

	/*echo $filho->__get('nome') . '<br>';
	$filho->__set('nome', 'Jamilton');
	echo $filho->__get('nome');
	//com isso se modifica o nome do pai

	echo '<pre>';
	print_r($filho);
	echo '</pre>';*/

	/*
	Se os métodos mágicos get e set estiverem na classe pai, os atributos privados poderão ser acessados
	porém ele trará os valores contidos no pai.
	Caso os métodos mágicos estejam nos filhos, é como se os atributos privados não existissem nessa classe
	*/

	echo $filho->execultarAcao();
	//como a ação execultarAcao() foi herada do objeto Pai como publico, o execultarMania() (privado) pode ser indiretamente acessado do contexto do objeto pai

	echo '<br>';

	echo $filho->x();
	//agr sim o execultarMania() chamado é do contexto do objeto filho
?>