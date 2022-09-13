var lista_frutas = Array();

lista_frutas[0] = 'banana';
lista_frutas[1] = 'maçã';
lista_frutas[2] = 'morango';
lista_frutas[3] = 'uva';

//IndexOf -> retorna o índice/chave que está contido a string 'morango' || caso o elemento não exista ele retorna -1

var auxiliar = lista_frutas.indexOf('banana');

if(auxiliar === -1) {
    console.log('elemento inexistente')
} else{
    console.log('o elemento existe e está na posição ' + auxiliar);
}

