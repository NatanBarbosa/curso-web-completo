let arr = ['Banana', 'Maçã', 'uva']

//find: retorna valor pesquisado, se existente, ou undefined caso não exista
let find = arr.find(item => item == 'Banana')

//include: retorna true ou false se o elemento pesquisado existe ou não
let include = arr.includes('aaaa')
console.log(include);