<?php
namespace App\Models; 
use MF\Model\Model;

class Tweet extends Model{
    private $id;
    private $id_usuario;
    private $tweet;
    private $data;

    public function __get($attr){
        return $this->$attr;
    }

    public function __set($attr, $value){
        $this->$attr = $value;
    }

    //salvar tweets
    public function salvar(){
        $query = "INSERT INTO tweets(id_usuario, tweet) VALUE(:id_usuario, :tweet)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id_usuario", $this->__get('id_usuario'));
        $stmt->bindValue(":tweet", $this->__get('tweet'));
        $stmt->execute();
    }

    //recuperar tweets
    public function getAll(){
        $query = "
            SELECT 
                t.id, 
                t.id_usuario, 
                u.nome, t.tweet, 
                DATE_FORMAT(t.data, '%d/%m/%y %H:%i') as data
            FROM 
                tweets as t 
                LEFT JOIN usuarios as u ON(t.id_usuario = u.id) 
            WHERE 
                id_usuario = :id_usuario
                OR t.id_usuario in(select id_usuario_seguindo from usuarios_seguidores where id_usuario = :id_usuario)
            ORDER BY 
                t.data DESC
        ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id_usuario", $this->__get('id_usuario'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //recuperar tweets com paginação
    public function getPorPagina($limit, $offset){
        $query = "
            SELECT 
                t.id, 
                t.id_usuario, 
                u.nome, t.tweet, 
                DATE_FORMAT(t.data, '%d/%m/%y %H:%i') as data
            FROM 
                tweets as t 
                LEFT JOIN usuarios as u ON(t.id_usuario = u.id) 
            WHERE 
                id_usuario = :id_usuario
                OR t.id_usuario in(select id_usuario_seguindo from usuarios_seguidores where id_usuario = :id_usuario)
            ORDER BY 
                t.data DESC
            LIMIT
                $limit
            OFFSET
                $offset
        ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id_usuario", $this->__get('id_usuario'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //recuperar total de tweets
    public function getTotalRegistros(){
        $query = "
            SELECT 
                count(*) as total
            FROM 
                tweets as t 
                LEFT JOIN usuarios as u ON(t.id_usuario = u.id) 
            WHERE 
                id_usuario = :id_usuario
                OR t.id_usuario in(select id_usuario_seguindo from usuarios_seguidores where id_usuario = :id_usuario)
        ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id_usuario", $this->__get('id_usuario'));
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    //remover um tweet
    public function removerTweet(){
        $query = "DELETE FROM tweets where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $this->__get('id'));
        $stmt->execute();
    }
}
?>