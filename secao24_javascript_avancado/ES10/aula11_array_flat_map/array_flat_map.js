// percorrer o array com um map e retornar um array unidimensional, em vez de um array com subarrays
let nomes = [
    'João, José, Maria',
    'Sandra, Paula',
    'Antonia, Fernanda, Marcos'
];

console.log(nomes);

let nomesMap = nomes.map(item => {
    return item.split(',');
})

console.log(nomesMap);

let nomesFlatMap = nomes.flatMap(item => {
    return item.split(',');
})

console.log(nomesFlatMap);