//Método executado mesmo se uma promise for resolvida ou rejeitada (then e catch)

let p = new Promise((resolve, reject) => {
    if(true){
        reject('Rejeitada');
    }

    resolve('resolvida');
})
.catch(resp => {
    console.log(resp);
})
.finally(() => {
    //não recebe o resolve nem reject
    console.log('fluxo se rejeitado ou resolvido');
});