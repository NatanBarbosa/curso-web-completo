<?php

namespace MF\Init;

//Classe responsável pela lógica de iniciamento e configuração das rotas. Ela será herdada pela classe Route
abstract class Bootstrap{
	private $routes;

	public function __construct(){
		$this->initRoutes();
		$this->run($this->getUrl());
	}

	abstract protected function initRoutes();

	public function getRoutes(){
		return $this->routes;
	}

	public function setRoutes(array $routes){
		$this->routes = $routes;
	}

	//retornar a url padrão (página que o usuário está)
	protected function getUrl(){
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}


	//disparar as actions do controller
	protected function run($url){
		foreach($this->getRoutes() as $path => $route){

			//teste se a url digitada compatível com alguma rota da aplicação
			if($url == $route['route']){

				//instanciar classe do IndexController
				$class = "App\\Controllers\\".ucfirst($route['controller']);

				$controller = new $class; //App\Controllers\IndexController

				$action = $route['action'];
				$controller->$action();
			}
		}
	}

}

?>