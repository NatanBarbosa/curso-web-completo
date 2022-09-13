//Objeto para processamentos assíncronos. Valor dispoível agr, no futuro, ou nunca. 
//Muito usada em requisições http. Ex.: Chamar API -> pending -> esperar o resultado 

let resposta = {};

let promessa = new Promise((resolve, reject) => {
    try {

        //throw new Error('Opa, houve um erro');

        setTimeout(() => {
            resposta = {dados: {msg: 'recuperamos os dados com sucesso'}}

            //ponto de solução
            resolve('sucesso');
        }, 3000)

    } catch(e) {
        setTimeout(() => {
            //ponto de solução
            reject(e);
        }, 3000)
    }
});

//pending: resolve só executado dps de 3 segundos
console.log(promessa);

//fulfilled: promessa resolvida. Ela foi resolvida de modo assíncrono, portanto não dá pra recuperar ela imediatamente na linha anterior. Apenas dá pra recuperar dps de 3 segundos
setTimeout(() => {
    console.log(promessa);
    console.log(resposta);
}, 5000);

//execução rápida demais para dar tempo da promise encher a resposta
console.log(resposta);
console.log(resposta);