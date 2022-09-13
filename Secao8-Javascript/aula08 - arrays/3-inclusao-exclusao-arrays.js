var lista_frutas = Array('banana', 'Maçã');

//incluir elemento no final do array -> array.push(elemento)
lista_frutas.push('uva');

//incluir elemento do início do array -> array.unshift(elemento)
lista_frutas.unshift('macaco'); // vai pra posição zero e o resto do array é realocado

//excluir elemento do final do array -> independente de qual seja o elemento no final ele vai ser excluido
lista_frutas.pop();

//excluir elemento do início do array -> independente de qual seja o elemento no início ele vai ser excluido
lista_frutas.shift();

//console.log(lista_frutas);

lista_coisas = [];
lista_coisas['frutas'] = Array();
lista_coisas['pessoas'] = [];

lista_coisas['frutas'].push('banana');
lista_coisas['frutas'].push('uva');
/*fazendo a inserção no array dentro do array(explicitando a array principal,
o índice do array secundário e o .push)*/

console.log(lista_coisas['frutas']);
