<?php

//Objeto tarefa (mesmos atributos do bd)
class Tarefa {
    private $id;
    private $id_status;
    private $descTarefa;
    private $data_cadastro;

    public function __get($attr){
        return $this->$attr;
    }

    public function  __set($attr, $valor){
        $this->$attr = $valor;
    }
}