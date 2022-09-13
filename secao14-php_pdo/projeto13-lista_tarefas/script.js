function editar(id, txtTarefa, pag) {
    //Criar um form de edição
    let form = document.createElement("form")
    form.action = 'tarefa_controller/tarefa_controller.php?acao=atualizar&pag='+pag
    form.method = 'post'
    form.className = 'row'

    //criar um input para entrada de texto
    let inputTarefa = document.createElement("input")
    inputTarefa.type = 'text'
    inputTarefa.name = 'updateTarefa'
    inputTarefa.className = 'form-control col-8'
    inputTarefa.value = txtTarefa

    //criar um input hidden para guardar o id da tarefa para servir de referência para qual tarefa atualizar no banco de dados
    let inputId = document.createElement('input')
    inputId.type = 'hidden'
    inputId.name = 'id'
    inputId.value = id

    //Criar um button para envio do form
    let botao = document.createElement("button")
    botao.type = 'submit'
    botao.className = 'btn btn-info col-3 ml-2'
    botao.innerHTML = 'Editar'

    //incluir o inputTarefa, inputId e o botao no form
    form.appendChild(inputTarefa)
    form.appendChild(botao)
    form.appendChild(inputId)

    //selecionar o div tarefa clicada para editar
    let tarefaEditar = document.getElementById('tarefa_' + id)

    //limpar o texto da tarefa para inclusão do form
    tarefaEditar.innerHTML = ''

    tarefaEditar.insertBefore(form, tarefaEditar[0])
    //incluir uma árvore de elementos dentro de outra árvore de elementos ja renderizados
    //parâmetros: árvore de elementos, dps de que elemento será adicionado(nesse caso o tarefaEditar está vazio e não possui filhos)
}

function remover(id, pag) {
    //redirecionar para o backend
    location.href = "tarefa_controller/tarefa_controller.remover.php?id="+id+"&pag="+pag
}

function marcarRealizada(id, pag){
    //redirecionar para o backend
    location.href = "tarefa_controller/tarefa_controller.marcarRealizada.php?id="+id+"&pag="+pag
}
