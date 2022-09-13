//Criando a classe que vai criar objetos de despesa
class Despesa{
	constructor(ano, mes, dia, tipo, descricao, valor){
		this.ano = ano
		this.mes = mes
		this.dia = dia
		this.tipo = tipo
		this.descricao = descricao
		this.valor = valor
	}

	validarDados(){
		//retorno: true(valido) ou false(invalido)
		for(let i in this){ //vai percorrer todo o objeto(this = despesa criada la em baixo)
			//o i vai retornar os índices do objeto
			//console.log(i, this[i])
			//ultilizar 'this' com [] passando o índice (i) ele vai retornar o par indice e valor

			if(this[i] == undefined || this[i] == '' || this[i] == null){
				return false
			}
		}
		return true //se nenhum dos dados estiver vazio, ao termino da função, ele retorna true
	}
}

class Bd{//"Banco de dados"
	//armazenando a Despesa

	constructor(){
		let id = localStorage.getItem('id') //Se é o primeiro cadastro de despesa, o retorno disso será null

		if (id === null){
			localStorage.setItem('id', 0)
			//Com isso, no primeiro cadastro, vai criar a primeira despeza com id 0
			//vai armazenar esse id no localstorage
		} 
	}

	getProximoId(){
		let proximoId = localStorage.getItem('id') //recuperar um dado dentro de localStorage(primeira despesa == 0)

		return parseInt(proximoId) + 1 //retorna um id diferente a cada vez q é chamado
		//Pegar a informação contida na chave 'id' e retornar ela + 1
	}

	gravar(d){
		//Gerar índices(primeiro parâmetro do setItem) dinâmicos para armazenar várias despesas

		let id = this.getProximoId() //adiciona +1 para o id q fará ele ficar diferente
		localStorage.setItem('id', id)

		localStorage.setItem(id, JSON.stringify(d)) //Atribui o id para o indice ficar dinamico e ele não sobrepor os objetos
	}

	recuperarTodosRegistros(){
		//array de despesas
		let despesas = Array()

		let id = localStorage.getItem('id')
		//esse id vai ser quando o laço de repetição termina(pq o id recebe +1 a cada vez q uma despesa é criada, fazendo assim ele ser o total de despesas)

		//recuperar todas as despesas cadastradas em localStorage
		for (let i = 1; i <= id; i++){

			//recuperar a despesa e Transformar os Json(strings) em objetos
			let despesa = JSON.parse(localStorage.getItem(i)) //vai pegar o item de acordo com o número do id

			//existe a possibilidade de haver índices que foram pulados/removidos
			//nestes casos nós vamos pular esses índices
			if(despesa === null){
				continue //faz com que o laço avançe para interação seguinte, desconsiderando o q está abaixo
			}

			despesa.id = i //incluindo um atributo nos objetos de despesa
			despesas.push(despesa)//a cada interação nós vamos acrescentar despesa dentro do Array despesas
		}

		return despesas //retorna o array com todos os objetos de despesa
	}

	pesquisar(despesaFiltro){ //esse parâmetro vai ser o objeto aplicador dos filtros
		let despesas = Array
		despesas = this.recuperarTodosRegistros()


		//filtros -> todos esses dados podem ser recuperados do objeto despesa

		//valor === objeto dentro do array 'despesas'
		//despesa === objeto que contem os filtros aplicados

		//ano
		if(despesaFiltro.ano != '' || despesaFiltro.ano != undefined){//Se o usuário deixar o campo vazio então não aplica o filtro
			despesas = despesas.filter( valor =>  valor.ano == despesaFiltro.ano)
			//array despesas recebe ele mesmo com o filtro de ano aplicado
		}
		
		//mes
		if(despesaFiltro.mes != '' || despesaFiltro.ano != undefined){
			despesas = despesas.filter( valor =>  valor.mes == despesaFiltro.mes)
		}

		//dia
		if(despesaFiltro.dia != '' || despesaFiltro.ano != undefined){
			despesas = despesas.filter( valor =>  valor.dia == despesaFiltro.dia)
		}
		//tipo
		if(despesaFiltro.tipo != '' || despesaFiltro.ano != undefined){
			despesas = despesas.filter( valor =>  valor.tipo == despesaFiltro.tipo)
		}
		//descricao
		if(despesaFiltro.descricao != '' || despesaFiltro.ano != undefined){
			despesas = despesas.filter( valor =>  valor.descricao == despesaFiltro.descricao)
		}
		//preco
		if(despesaFiltro.preco != '' || despesaFiltro.ano != undefined){
			despesas = despesas.filter( valor =>  valor.preco == despesaFiltro.preco)
		}

		return despesas //devolve esse array para a função 'pesquisar despesa'
	}

	remover(id){
		localStorage.removeItem(id) //remove algo do localStorage de acordo com a sua key
	}
}

let bd =  new Bd()

function cadastrarDepesa(){
	//pegando valores
	let ano = document.getElementById('ano')
	let mes = document.getElementById('mes')
	let dia = document.getElementById('dia')
	let tipo = document.getElementById('tipo')
	let descricao = document.getElementById('descricao')
	let valor = document.getElementById('preco')

	//instanciando uma nova despesa
	let despesa = new Despesa(ano.value, mes.value, dia.value, tipo.value, descricao.value, valor.value)
	
	//antes da gravação vamos ver se os dados tão certinhos
	
	if(despesa.validarDados() === true){
		bd.gravar(despesa)

		//exibindo o modal sucesso
		document.getElementById('cor-do-texto').className = 'modal-header' + ' ' + 'text-success' 
		document.getElementById('exampleModalLabel').innerHTML = 'Sucesso na gravação'
		document.getElementById('msg').innerHTML = 'Sua nova despesa foi gravada com sucesso. <br> Vá no campo <a href="consulta.html">Consulta</a> para consulta-la'
		document.getElementById('botao2').className = 'btn' + ' ' + 'btn-success'
		document.getElementById('botao2').innerHTML = 'Voltar'
		document.getElementById('botao2').onclick = limpeza()

		$('#Mensagem').modal('show')
	} else {
		//exibindo o modal erro
		document.getElementById('cor-do-texto').className = 'modal-header' + ' ' + 'text-danger' 
		document.getElementById('exampleModalLabel').innerHTML = 'Erro na gravação'
		document.getElementById('msg').innerHTML = 'Existem campos obrigatórios que não foram preenchidos'
		document.getElementById('botao2').className = 'btn' + ' ' + 'btn-danger'
		document.getElementById('botao2').innerHTML = 'Voltar e corrigir'

		$('#Mensagem').modal('show')
		
	}

	//Toda vez q clicar no botão para adicionar ele vai criar a mesma variavel despesa, istancia um novo objeto
	//tbm vai chamar o método validarDados que vai ver se a digitação está certinha
	//tbm vai chamar o método gravar que vai gerar indices dinâmicos para armazenar vários objetos em LocalStorage
}



//limpadinha de leves
function limpeza(){
	//pegando valores
	document.getElementById('ano').value = ''
	document.getElementById('mes').value = ''
	document.getElementById('dia').value = ''
	document.getElementById('tipo').value = ''
	document.getElementById('descricao').value = ''
	document.getElementById('preco').value = ''
}

function carregaListaDespesas(despesas = Array()){ //Parâmetro pardrão = Array() pois no onload ele não passa nenhum parâmetro

	if(despesas.length == 0){ //caso ele caia no valor default pra despesas (qnd carrega a página) e true para 'filtrar'(qnd carrega a páguna ao invez de apertar o botão)
		//qnd a página 'consulta' é carregada ele chama esse método dentro de bd
		despesas = bd.recuperarTodosRegistros() //armazena o array de despesas dessa função nesse outro array que vai exibir na pág consulta
	}

	

	//Colocando o array na tabela
	let listaDespesas = document.getElementById('lista-despesas')
	listaDespesas.innerHTML = ''

	/*
		<tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
	*/

	//percorrer o array despesas, listando cada despesa de forma dinâmica
	despesas.forEach(valor =>{
		//parâmetro = valor contido em cada uma das posições do array
		
		//criando a linha (tr)
		let linha = listaDespesas.insertRow() //um método que insere linhas de acordo com a quatidade de valores no array

		//criando coluna (td)
		//insertCell() -> método usado quando se tem uma rol e se quer criar colunas. o méto recebe por parâametro sua posição, de 0 até n, dependendo quantas colunas vc quer criar
		linha.insertCell(0).innerHTML = `${valor.dia}/${valor.mes}/${valor.ano}`

		//ajustar o tipo
		switch(parseInt(valor.tipo)){
			case 1: valor.tipo = 'Alimentação'
			break
			case 2: valor.tipo = 'Educação'
			break
			case 3: valor.tipo = 'Lazer'
			break
			case 4: valor.tipo = 'Saúde'
			break
			case 5: valor.tipo = 'Transporte'
			break
		}

		linha.insertCell(1).innerHTML = valor.tipo
		linha.insertCell(2).innerHTML = valor.descricao
		linha.insertCell(3).innerHTML = valor.valor + ' R$'

		//criar botão de exclusão
		let btn = document.createElement('button')
		btn.className = 'btn btn-danger'
		btn.innerHTML = '<i class="fas fa-times"></i>'
		btn.id = `id_despesa${valor.id}` //assim o id é pego no for da função recuperarTodosRegistros() e coincide com o id do localStorage
		btn.onclick = () => { 
			//Mostrar confirmação
			document.getElementById('cor-do-texto').className = 'modal-header' + ' ' + 'text-warning' 
			document.getElementById('exampleModalLabel').innerHTML = 'Aviso! Despesa será excluida.'
			document.getElementById('msg').innerHTML = 'Você tem certeza que deseja excluir essa despesa?'
			document.getElementById('botao3').className = 'btn' + ' ' + 'btn-warning'
			document.getElementById('botao2').className = 'btn' + ' ' + 'btn-primary'
			document.getElementById('botao2').innerHTML = 'Voltar'
			document.getElementById('botao3').innerHTML = 'Excluir'
			$('#aviso').modal('show')

			//Botão de exclusão pressionado
			document.getElementById('botao3').onclick = () => {
				//remover a instrução 'id_despesa' pra num da ruim
				let id = btn.id.replace('id_despesa', '')
				bd.remover(id)
				window.location.reload()
			}
		}
		linha.insertCell(4).append(btn)
	})
}

function pesquisarDespesa(){ //dai qnd ele clicar no botão vai chamar essa função e as tr e td serão recolocadas
	let ano = document.getElementById('ano').value
	let mes = document.getElementById('mes').value
	let dia = document.getElementById('dia').value
	let tipo = document.getElementById('tipo').value
	let descricao = document.getElementById('descricao').value
	let valor = document.getElementById('preco').value

	let despesa = new Despesa(ano, mes, dia, tipo, descricao, valor) //a criação de um novo objeto não servirá para armazenar, mas sim para pesquisar

	let despesasFiltradas = bd.pesquisar(despesa) //despesas = array das despesas filtradas

	carregaListaDespesas(despesasFiltradas)
}

function consultaGastos() {
	//Pegando elementos
	let tipo = document.getElementById('pesquisa_tipo').value
	let mes = document.getElementById('pesquisa_mes').value

	//validando formumário
	if(tipo == '' && mes == ''){
		//exibindo o modal erro
		$('#erro_pesquisa').modal('show')
	}

	//Pegando objetos do localStorage
	let id = localStorage.getItem('id')
	let itens = Array()

	for(let i = 1; i<= id; i++){
		itens[i] = JSON.parse(localStorage.getItem(i))
	}

	//filtrando o array de objetos
	if(tipo != ''){
		itens = itens.filter(valor => valor.tipo == tipo)
	}
	if(mes != ''){
		itens = itens.filter(valor => valor.mes == mes)
	}

	//Adquirindo o valor total
	let valorTotal = 0
	for(i in itens){
		valorTotal += Number(itens[i].valor)
	}
	console.log(valorTotal)

	//Colocando resultado na pág HTML
	let result = document.getElementById('result')

	switch (mes) {
		case "1":
			mes = "janeiro"
			break;

		case "2":
			mes = "fevereiro"
			break;

		case "3":
			mes = "março"
			break;

		case "4":
			mes = "abril"
			break;

		case "5":
			mes = "maio"
			break;

		case "6":
			mes = "junho"
			break;

		case "7":
			mes = "julho"
			break;

		case "8":
			mes = "agosto"
			break;

		case "9":
			mes = "setembro"
			break;

		case "10":
			mes = "outubro"
			break;

		case "11":
			mes = "novembro"
			break;

		case "12":
			mes = "dezembro"
			break;
	
		default:
			mes = ""
			break;
	}

	switch(parseInt(tipo)){
		case 1: tipo = 'Alimentação'
		break
		case 2: tipo = 'Educação'
		break
		case 3: tipo = 'Lazer'
		break
		case 4: tipo = 'Saúde'
		break
		case 5: tipo = 'Transporte'
		break
	}

	if(mes == ''){
		result.innerHTML = `Você gastou R$${valorTotal} em compras do tipo ${tipo}`
	} else if(tipo == ''){
		result.innerHTML = `Você gastou R$${valorTotal} em compras no mês de ${mes}`
	} else{
		result.innerHTML = `Você gastou R$${valorTotal} em compras do tipo ${tipo} no mês de ${mes}`
	}
	
}