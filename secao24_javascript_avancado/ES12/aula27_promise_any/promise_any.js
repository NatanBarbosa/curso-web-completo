// Tratar erros em coleçar de promises

const p1 = new Promise((resolve, reject) => {
    setTimeout(() => {
        resolve('p1 resolvida')
    }, 3000)
})

const p2 = new Promise((resolve, reject) => {
    setTimeout(() => {
        reject('p2 resolvida')
    }, 2000)
})

const p3 = new Promise((resolve, reject) => {
    setTimeout(() => {
        resolve('p3 resolvida')
    }, 4000)
})

Promise.any([p1, p2, p3])
    .then(resolve => {
        //Recebe o parâmetro da 1º promise resolvida (p2 tem menos tempo)
        //Pula a promise caso de reject (caso ela seja a 1º retornada) -> pula a p2 -> p1 proxima
        console.log(resolve);
    })
    //caso todas as promises sejam rejeitadas, dá pra capturar o erro