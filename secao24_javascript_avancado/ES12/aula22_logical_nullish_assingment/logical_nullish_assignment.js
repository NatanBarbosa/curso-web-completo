//Operador testar a variável durante atribuição de valores -> verifica se possui um valor prévio nulo ou undefined
//Se sim(não tem valor utilizável), atribui, senão (tem valor utilizável), não atribui

let v1 = 10;
let v2 = null; //var nula: null ou undefinded
let v3 = undefined

//logical nullish assignment (??=) -> se a variável tiver valor nulo, valor 50 será atribuido. Senão 50 será descartado
v1 ??= 50;
v2 ??= 100;
v3 ??= 300;

console.log(v1, v2, v3);

// ----------
let carro = {
    marca: 'Volkswagen'
};

carro.marca ??= 'Mercedez'
carro.modelo ??= 'T-Cross' //atributo undefined
carro.ano ??= 2021 //atributo undefined

console.log(carro);

let arr = ['uva', 'João', null, undefined, 5, []];

arr.forEach((item, index) => {
    arr[index] ??= '<Não Informado>'; //Se o valor do índice for nulo, atribuo coisa
})

console.log(arr);