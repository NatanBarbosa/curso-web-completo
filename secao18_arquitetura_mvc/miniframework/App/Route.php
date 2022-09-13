<?php

namespace App; //mesmo nome do diretório atual -> classes dentro desse espaço App

//importar o boostrap para herdar o Route
use MF\Init\Bootstrap;

class Route extends Bootstrap{

	//rotas que a aplicação vai possuir
	protected function initRoutes(){

		//se a url for home, o controlador vai ser o indexController.php com a ação index
		$routes['home'] = array(
			'route' => '/',
			'controller' => 'IndexController',
			'action' => 'index'
		);

		$routes['sobre_nos'] = array(
			'route' => '/sobre_nos',
			'controller' => 'indexController',
			'action' => 'sobreNos'
		);

		$this->setRoutes($routes);
	}
}

?>