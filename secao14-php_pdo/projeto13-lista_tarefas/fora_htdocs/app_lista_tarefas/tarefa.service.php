<?php

//Intermediar a gravação de uma tarefa no banco de dados
class TarefaService{

    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao, Tarefa $tarefa){ //objeto da classe Conexao/ objeto da classe Tarefa (se vier outro tipo de atributo o programa vai dar erro)
        $this->conexao = $conexao->conectar(); //instância PDO
        $this->tarefa = $tarefa;
    }

    public function inserir(){ //create/insert
        $query = "INSERT INTO tb_tarefas(tarefa) VALUES(:tarefa)";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa',$this->tarefa->__get('descTarefa'));
        $stmt->execute();
    }

    public function recuperar(){ //read/select
        $query = "SELECT t.id, s.status, t.tarefa FROM tb_tarefas as t left join tb_status as s on(t.id_status = s.id)";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ); //retorna o array de objetos
    }

    public function atualizar(){ // update
        $query = "UPDATE tb_tarefas SET tarefa = ? WHERE id = ? ";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('descTarefa'));
        $stmt->bindValue(2, $this->tarefa->__get('id'));
        return $stmt->execute(); //retorna n para n registros atualizados (no caso 1 ou 0)
        /*
        primeiro ponto de interrogação: 1 -> descTarefa
        segundo ponto de interrogação: 2 -> id
         */
    }

    public function remover(){ //delete
        $query = "DELETE FROM tb_tarefas WHERE id = ?";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('id'));
        $stmt->execute();
    }

    public function marcarRealizada(){ // update
        $query = "UPDATE tb_tarefas SET id_status = ? WHERE id = ? ";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('id_status'));
        $stmt->bindValue(2, $this->tarefa->__get('id'));
        return $stmt->execute();
    }

    public function recuperarPendentes(){ //read/select
        $query = "SELECT id, id_status, tarefa FROM tb_tarefas WHERE id_status = ?";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('id_status'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ); //retorna o array de objetos
    }
}