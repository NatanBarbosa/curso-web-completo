<?php
namespace App\Models; 
use MF\Model\Model;

class UsuariosSeguidores extends Model{
	private $id;
	private $id_usuario; //usuário da seção
	private $id_usuario_seguindo; //usuário que quero seguir

	public function __get($attr){
		return $this->$attr;
	}

	public function __set($attr, $valor){
		$this->$attr = $valor;
	}

	public function seguirUsuario(){
        $query = "INSERT INTO usuarios_seguidores(id_usuario, id_usuario_seguindo) value (:id_usuario, :id_usuario_seguindo)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->bindValue(':id_usuario_seguindo', $this->__get('id_usuario_seguindo'));
        $stmt->execute();

        return true;
    }

    public function deixarSeguirUsuario(){
        $query = "DELETE FROM usuarios_seguidores WHERE id_usuario = :id_usuario AND id_usuario_seguindo = :id_usuario_seguindo";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->bindValue(':id_usuario_seguindo', $this->__get('id_usuario_seguindo'));
        $stmt->execute();

        return true;
    }
}
?>