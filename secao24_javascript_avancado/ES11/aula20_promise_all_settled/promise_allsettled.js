//Método que recebe por parâmetro uma coleção de promessas. Qnd todas promessas serem resolvidas/rejeitadas, ele recebe uma promessa final, com todos os resultados das anteriores
const promise1 = new Promise((resolve, reject) => {
    return setTimeout(() => resolve('Promise 1 resolvida'), 2000);
})

const promise2 = new Promise((resolve, reject) => {
    return setTimeout(() => reject('Promise 2 rejeitada'), 2000);
})

const promise3 = new Promise((resolve, reject) => {
    return setTimeout(() => resolve('Promise 3 resolvida'), 2000);
})

//Coleção de promises
const promises = [promise1, promise2, promise3];

Promise.allSettled(promises)
    .then(resultados => {
        resultados.forEach((resultado) => {
            if (resultado.status == 'fulfilled') {
                console.log(resultado.status, resultado.value);
            } else {
                console.log(resultado.status, resultado.reason);
            }
            
        })
    })