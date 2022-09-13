//Array
let arr = [10, 20, 30, 40]

//pegando o primeiro valor e juntando os demais dentro de uma única variável
let [a, ...resto] = arr //usa o operador rest para juntas os demaais valores
console.log(a)
console.log(resto) //os demais valores foram juntados em um arraya resto

console.log('---------------------------------------------------------------------------')

//objetos
let obj = {
	x: 10,
	y: 20,
	z: 30,
	w: 40
}

//pegando o atributo a, e os demais atributos jogando dentro de uma variável que será um objeto
let { x, ...resto_objetos } = obj
console.log(x)
console.log(resto_objetos)


