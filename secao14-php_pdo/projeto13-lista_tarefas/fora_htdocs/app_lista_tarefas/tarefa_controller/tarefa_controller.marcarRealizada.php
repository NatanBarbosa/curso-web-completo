<?php
require "D:/xampp/app_lista_tarefas/tarefa.model.php";
require "D:/xampp/app_lista_tarefas/tarefa.service.php";
require "D:/xampp/app_lista_tarefas/conexao.php";

$tarefa = new Tarefa();
$tarefa->__set('id',$_GET['id']);
$tarefa->__set('id_status', 2);

$conexao = new Conexao();

$tarefaService = new TarefaService($conexao, $tarefa);
$tarefaService->marcarRealizada();

$pag = $_GET['pag'];
header("Location: ../$pag.php");