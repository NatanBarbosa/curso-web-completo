$(document).ready(() => {

    //Fazendo requisições assíncronas
    //método load -> request de uma nova página, substituindo pelo conteúdo referenciado
    $('#documentacao').on('click', () => {
        $('#pagina').load('paginas/documentacao.html')
    })

    $('#suporte').on('click', () => {
        $('#pagina').load('paginas/suporte.html')
    })

    //Fazer requisição pros dados do backend
    /*
        método $.ajax(): faz a requisição assíncrona com o objeto XMLHttpRequest
        parâmetro: objeto literal com:
        - type: método (GET ou POST)
        - url: arquivo do projeto
        - data: dados de um form em urlencoded (tipo os parâmetros do get)
        - dataType: como o valor será retornado
        - success: ação para tomar caso sucesso. Parâmetro da função é o retorno de dos dados escritos no requested
        - error: ação para tomar caso erro
    */
    $('#competencia').on('change', () => {
        //transformar dados do select em url-encoded
        let competencia = $('form').serialize()

        if(competencia != ""){
            $.ajax({
                type: 'GET',
                url: 'app.php',
                data: competencia,
                dataType: 'json', //retorna um objeto literal
                success: dados => {
                    //colocando os dados em cada card
                    $('#numeroVendas').html(dados.numeroVendas)
                    $('#totalVendas').html(dados.totalVendas)
                    $('#clientesAtivos').html(dados.clientesAtivos)
                    $('#clientesInativos').html(dados.clientesInativos)
                    $('#elogios').html(dados.elogios)
                    $('#reclamacoes').html(dados.reclamacoes)
                    $('#sugestoes').html(dados.sugestoes)
                    $('#despesas').html(dados.totalDespesas)
                },
                error: erro => console.log(erro)
            })
        }

    })

    //serialize: converter dados de formulários para o formato url-encoded (o do GET lá)

})