

//destructring -> operador de desetruturação: tira valores de dentro de uma estrutura(Um array ou objeto)

let frutas = ['abacaxi', 'uva', 'pera', 'mamão']

let [a, b, , c] = frutas
//os colchetes à esquerda do operador de atribuição significa operador destructuring
//dentro dos colchetes serão declaradas novas variáveis e serão atribuidos os valores na posição que esses variáveis foram declaradas
//ex.: a = frutas[0] | b = frutas[1] | pula a pera(pular o índice) | c = frutas[3]

console.log(a, b, c)

//atribuir valores padrões no momento da desestruturação dos arrays
let frutas2 = ['Maçã', 'Abacate', 'Pitaia', 'Morango']

let [x = 'Tomate', y, z, w, v = 'banana'] = frutas2
//o quinto valor não existe no array, então se cria um valor default que ele irá assumir
//se eu tentar colocar um valor default em uma variável ja pega um valor existente,o valor default será desconsiderado(nesse caso x = 'Maçã')
console.log(x, y, z, w, v)


//desestruturação em um array multidimensional
let coisas = [['abacaxi', 'uva', 'pera', 'mamão'], ['José', 'Maria']]
let [[, , fruta], [, nome]] = coisas
//Exemplo.: recuperar o valor 'Maria'. pula o primeiro índice, abre e fecha colchetes denovo para indica que você quer algode um array dentro de outro
console.log(nome)
console.log(fruta)
