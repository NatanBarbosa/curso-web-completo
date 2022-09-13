//padStart: Faz o preenchimento da string a esquerda
//padStart(<qnt de caracteres que a string vai ter>, <caracter que será repitido>)
let codigo = '1000';
codigo = codigo.padStart(10, '0') //adicionará 6 zeros
console.log(codigo);

//padEnd
let codigo2 = '8*8'
codigo2 = codigo2.padEnd(19, '*8')
console.log(codigo2 + ' = ' + 8 ** 8)