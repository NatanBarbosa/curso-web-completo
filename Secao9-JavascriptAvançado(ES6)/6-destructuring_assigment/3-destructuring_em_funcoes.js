//array
let arr = [10, 20, 30, 40]

/*
function teste([ a, b, , c , d = 50]){ //Com isso ele já pega direto os valores dentro da primeira e segunda posição
	console.log(a,b, c, d)
	//tbm da pra definir valores default
}

teste(arr) //manda o array todo como parâmetro e o destructuring vai armazenar em a e b os 1º e 2º valores
*/


//objetos
let obj = {
	a: 10,
	b: 20,
	c: 30,
	d: 40
}

function teste({ a: x, d, e = '10' }) { //usando o destructuring iremos extrair o atributo a e o b | tbm da pra por outros nomes no atributo que será o parâmetro | tbm da pra incluir valores defalut para atributos undefined dentro de funções
	console.log(x, d, e)
}

teste(obj)//passa como parâmetro o objeto completo

