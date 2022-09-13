//remover espaços do começo ou final de uma string

let texto = '              Teste                       ';

console.log('.' + texto + '.')
console.log('.' + texto.trimStart().trimEnd() + '.')

//apelidos: trimLeft, trimRight