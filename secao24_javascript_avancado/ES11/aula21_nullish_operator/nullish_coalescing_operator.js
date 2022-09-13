//Testando com o operador lógico OR

let teste1 = null || 'Valor a direita'; //retorna o valor a esquerda, desde que seja um valor válido (!== null, undefined, NaN, 0, '')
let teste2 = 0 || 'Valor a direita';
let teste3 = undefined || 'Valor a direita';
let teste4 = '' || 'Valor a direita';
let teste5 = 'Valor a esqueda' || 'Valor a direita';

console.log('teste 1:', teste1);
console.log('teste 2:', teste2);
console.log('teste 3:', teste3);
console.log('teste 4:', teste4);
console.log('teste 5:', teste5);

console.log('_______________________')

//Porém, em certos casos, o 0 ou a string vazia pode ser considerado um valor utilizável na lógica
//aí que entra o nullish coalescing (??) -> considera o 0 e a string vazia ('')
teste1 = null ?? 'Valor a direita';
teste2 = 0 ?? 'Valor a direita';
teste3 = undefined ?? 'Valor a direita';
teste4 = '' ?? 'Valor a direita';
teste5 = 'Valor a esqueda' ?? 'Valor a direita';

console.log('teste 1:', teste1);
console.log('teste 2:', teste2);
console.log('teste 3:', teste3);
console.log('teste 4:', teste4);
console.log('teste 5:', teste5);