let asyncProcess = new Promise((resolve, reject) => {
    setTimeout(() => {
        resolve('Sucesso no processo assíncrono');
    }, 3000);
})

//Função que faz processamentos assíncronos. Permite sequenciar os processamentos com await
//Uma async function se torna uma Promise, portanto, dá pra usar o then na chamada
async function recuperarDados(){
    //Precisa aguardar a resolução desse processamento assincrono
     await asyncProcess.then(param => {
        console.log(param);
    })

    console.log('Processamento assíncrono 1');

    await fetch('https://jsonplaceholder.typicode.com/comments')
        .then(resp => resp.json())
        .then(dados => console.log('comentários: ', dados));

    console.log('Processamento assíncrono 2');

    await fetch('https://jsonplaceholder.typicode.com/posts')
        .then(resp => resp.json())
        .then(dados => console.log('Posts: ', dados));

    console.log('Processamento assíncrono 3');
}

recuperarDados().then( () => {
    console.log('fim');
});
