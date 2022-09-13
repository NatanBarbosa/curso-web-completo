<?php
namespace App\Models; 
use MF\Model\Model;

class Usuario extends Model{
	private $id;
	private $nome;
	private $email;
	private $senha;

	public function __get($attr){
		return $this->$attr;
	}

	public function __set($attr, $valor){
		$this->$attr = $valor;
	}

	//salvar
	public function salvar(){
		$query = "INSERT INTO usuarios(nome, email, senha) Values(:nome, :email, :senha)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(":nome", $this->__get('nome'));
		$stmt->bindValue(":email", $this->__get('email'));
		$stmt->bindValue(":senha", md5($this->__get('senha'))); 
		$stmt->execute();

		return $this;
	}

	//Validação de cadastro
	public function validarCadastro(){
		$valido = true;

		if(strlen($this->__get('nome')) < 3){
			$valido = false;
		}

		if(strlen($this->__get('email')) < 3){
			$valido = false;
		}

		if(strlen($this->__get('senha')) < 3){
			$valido = false;
		}

		if(count($this->getUsuarioPorEmail()) > 0){
			$valido = false;
		}

		return $valido;
	}

	//Recuperar usuário por email
	public function getUsuarioPorEmail(){
		$query = "SELECT nome, email from USUARIOS where email = :email";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':email', $this->__get('email'));
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	//autenticar usuário
	public function autenticar(){
		$query = "SELECT id, nome, email FROM usuarios where email = :email AND senha = :senha";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':email', $this->__get('email'));
		$stmt->bindValue(':senha', $this->__get('senha'));
		$stmt->execute();

		$usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

		if(!empty($usuario['id']) && !empty($usuario['nome'])){
			$this->__set('id', $usuario['id']);
			$this->__set('nome', $usuario['nome']);
		}
	}

	public function getAll(){
		$query = "
			SELECT 
				u.id, 
				u.nome, 
				u.email,
				(
					SELECT 
						count(*)
					FROM
						usuarios_seguidores as us
					WHERE
						us.id_usuario = :id_usuario AND us.id_usuario_seguindo = u.id  
				) as seguindo_sn 
			FROM 
				usuarios as u
			WHERE 
				u.nome LIKE :nome AND u.id != :id_usuario
		";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(":nome", '%' . $this->__get('nome') . '%');
		$stmt->bindValue(":id_usuario", $this->__get('id')); 	
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	//Informações do usuário
	public function getInfoUsuario(){
		$query = "SELECT nome from usuarios where id = :id";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id', $this->__get('id'));
		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	//total de tweets
	public function getTotalTweets(){
		$query = "SELECT count(*) as total_tweet from tweets where id_usuario = :id_usuario";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id_usuario', $this->__get('id'));
		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	//total de usuários que estamos seguindo
	public function getTotalSeguindo(){
		$query = "SELECT count(*) as total_seguindo from usuarios_seguidores where id_usuario = :id_usuario";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id_usuario', $this->__get('id'));
		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	//total de seguidres
	public function getTotalSeguidores(){
		$query = "SELECT count(*) as total_seguidores from usuarios_seguidores where id_usuario_seguindo = :id_usuario";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id_usuario', $this->__get('id'));
		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}
}
?>