<?php 
namespace MyApp\controllers;

class Home{
	protected $container;

	public function __construct($container){
		//Passar o container com uma dependência configurada
		//slim injeta o container no construtor	
		$this->container = $container;
	}

	public function index($request, $response){
		//$this->container == $app
		$view = $this->container->get('View');
		var_dump($view);
		return $response->write('teste index');
	}
}
?>