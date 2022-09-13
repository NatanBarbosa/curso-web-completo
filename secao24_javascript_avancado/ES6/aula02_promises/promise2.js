//encadeamento de operações assíncronas

let promessa = new Promise((resolve, reject) => {
    //requisição http para recuperar uma lista de usuários...
    setTimeout(() => {
        //requisição feita usando fetch
        let resposta_requisicao = {};

        //erro na requisição
        if(true){
            resposta_requisicao = {
                codigo: 1050,
                erro: 'Falha de autorização'
            };

            reject(resposta_requisicao);
        }

        //requisição feita com sucesso
        resposta_requisicao = {
            0: {id: 1, nome: 'João'},
            1: {id: 2, nome: 'Carlos'},
            2: {id: 3, nome: 'Magno'}
        }

        resolve(resposta_requisicao)
    }, 4000);
}).then(dados => {
    //método disparado apenas dps da promise dar o resolve (assíncrono). Ele recupera o resposta_requisicao passado como parâmetro
    console.log('Operacao sequencial: ', dados);

    return {obs: 'Usando o return, é possível passarum parâmetro para o then seguinte'};
}).then((param) => {
    console.log(param);
}).then(() => {
    console.log('Operação concluída')
}).catch(erro => {
    //Método para tratar a promise caso ela retorne um reject. Ele recupera o resposta_requisicao passado como parâmetro
    console.log('Operação sequencial: ', erro);

    return 'Fim'
}).then(param => {
    console.log(param);
}); 
//pode encadear outros "then" dps do catch, mas eles tbm são executados mesmo se for resolve
//Pode ter outras promises dentro do then