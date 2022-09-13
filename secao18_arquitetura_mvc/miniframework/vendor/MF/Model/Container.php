<?php 
namespace MF\Model;
use App\Connection;

//forma com que toda action do controlador vai trabalhar com o model

class Container{
	public static function getModel($model){
		//retornar o modelo já instanciado com a conexão já estabalecida

		//instâcia da conexão
		$con = Connection::getDb();

		//instância do modelo (new Produto($con);)
		$class = "\\App\\Models\\".ucfirst($model);
		return new $class($con);

	}
}
?>