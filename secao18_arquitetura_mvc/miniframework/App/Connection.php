<?php 

namespace App;

class Connection{

	//Um metodo stático permite ser chamado diretamente sem instanciar a classe
	public static function getDb(){
		try{
			$con = new \PDO("mysql:host=localhost;dbname=mvc;charset=utf8", "root", "");
			return $con;
		} catch (\PDOException $e){
			//tratamento do erro...
		}
	}
}

?>