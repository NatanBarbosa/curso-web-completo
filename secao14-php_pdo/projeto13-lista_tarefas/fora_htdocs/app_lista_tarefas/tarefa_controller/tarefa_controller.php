<?php

#juntando os scripts anteriores(com classes criadas)
//Como esse script será executado no diretório público, os requires daqui precisam ser referentes ao diretório público também
require "D:/xampp/app_lista_tarefas/tarefa.model.php";
require "D:/xampp/app_lista_tarefas/tarefa.service.php";
require "D:/xampp/app_lista_tarefas/conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
//se existir um $_GET['acao'] essa variavel vai receber o valor dele('inserir' ou 'atualizar'), se não existir, essa variável vai receber o valor 'recuperar'

###Inserir dados
if ($acao == 'inserir') {

    #instanciando nova tarefa
    $tarefa = new Tarefa();
    $tarefa->__set('descTarefa', $_POST['descTarefa']);
    //não precisa settar os outros atributos pois eles tem valores default

    #Inserindo no banco de dados
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);

    $tarefaService->inserir();

    #Feedback para o usuário
    header('Location: ../nova_tarefa.php?inclusao=1');

} else if($acao == 'recuperar'){

###Recuperar dados
    $tarefa = new Tarefa();
    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $listaTarefas = $tarefaService->recuperar(); //recebe o retorno do array da lista de tarefas no banco de dados
    //Essa variável vai estar disponível no escopo do script "todas_tarefas.php"

} else if($acao = 'atualizar'){
###atualizar dados
    $updateTarefa = new Tarefa();
    $updateTarefa->__set('id', $_POST['id']);
    $updateTarefa->__set('descTarefa', $_POST['updateTarefa']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $updateTarefa);
    if($tarefaService->atualizar()){
        //retorna n para n registros atualizados (no caso 1 ou 0)
        //1 = true
        //0 = false
        $pag = $_GET['pag'];
        header("Location: ../$pag.php");
    }
}