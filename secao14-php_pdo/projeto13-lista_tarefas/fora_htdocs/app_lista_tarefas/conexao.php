<?php

class Conexao {
    private $host = 'localhost';
    private $dbname = 'bd_lista_tarefas';
    private $user = 'root';
    private $password = '';

    public function conectar(){
        //Iniciando conexão com o bd com PDO
        try{
            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->password"
            );

            return $conexao;

        } catch (PDOException $e){
            echo 'Não foi possivel se conectar com o servidor <br>';
            echo 'Código do erro: ' . $e->getCode() . '<br> Mensagem de erro: ' . $e->getMessage();
        }
    }

}
