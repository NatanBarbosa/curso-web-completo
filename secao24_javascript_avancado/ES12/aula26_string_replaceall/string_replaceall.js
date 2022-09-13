//Método que localiza e substitui toda ocorrência de uma string em um texto

let texto = 'O João está trabalhando no código fonte. Antes de fazer a alteração, é bom validar com o João'
console.log(texto.replace('João', 'Natan')); //replace apenas 1º ocorrência
console.log(texto.replaceAll('João', 'Natan'));