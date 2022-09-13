

let produto = {
	descricao: 'notebook',
	preco: 1800,
	detalhes: {
		fabricante: 'abc',
		modelo: 'xyz'
		//composição "tem um" objeto dentro de objeto
	}
}

//let { descricao, preco } = produto
//para desestruturar valores dentro de objetos usaa o token de chaves
//para recuperar os valores é só indicar dentro do destructuring seus nomes/chaves

//let { descricao: d, preco: p } = produto //dá um outro nome para variável que irá conter o descricao e preco

//let { descricao: d, preco: p = 5000, desconto = 5 } = produto
//dá pra aplicar um valor default caso a chave que estamos indicando no objeto nõ exista(mesma lógica do array)



//extrair um objeto dentro de um atributo de outro objeto
let { detalhes: { fabricante: f, modelo = 'Não informado' } } = produto
console.log(f, modelo)
//se o modelo for undefined ele vai retornar isso.

