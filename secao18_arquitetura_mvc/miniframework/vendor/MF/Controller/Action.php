<?php

namespace MF\Controller;

//requisitos não funcionais da classe Controller
//essa calsse tem a lógica genérica de qualquer renderização de view
//A referência dos requires é o public/index.php

abstract class Action {
	protected $view;

	public function __construct(){
		$this->view = new \stdClass(); //criar um objeto vazio
	}

	protected function render($view, $layout){
		$this->view->page = $view;

		if(file_exists("../App/Views/".$layout.".phtml")){
			require_once "../App/Views/".$layout.".phtml";
		} else{
			$this->content();
		}
	}

	protected function content(){
		//pegar qual diretório do controller atual
		$classeAtual = get_class($this);
		$classeAtual = str_replace('App\\Controllers\\', '', $classeAtual);
		$classeAtual = strtolower(str_replace('Controller', '', $classeAtual));

		require_once '../App/Views/'. $classeAtual .'/' . $this->view->page . '.phtml';
	}
}

?>