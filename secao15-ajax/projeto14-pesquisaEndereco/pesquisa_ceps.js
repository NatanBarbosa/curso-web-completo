/*
https://viacep.com.br/
Essa API recebe o cep digitado "viacep.com.br/ws/01001000/json/unicode/" e retorna um objeto JSON
com o endereço, bairro, cidade, tudo completo. O unicode previne que venham caracteres especiais quebrados
Leia mais acessando o link
*/

function getEndereco(cep){
	//adquirindo url de consulta da API
	let url = `https://viacep.com.br/ws/${cep}/json/unicode/`

	//Requisição assíncrona
	let ajax = new XMLHttpRequest()
	ajax.open('GET', url)

	ajax.onreadystatechange = () => {
		if(ajax.readyState == 4 && ajax.status == 200){
			let enderecoJSON = ajax.responseText

			//convertendo a resposta JSON em objeto
			enderecoJSON = JSON.parse(enderecoJSON)
			console.log(enderecoJSON)
			if(enderecoJSON.erro == true){
				//tratativa de CEP invalido
				let aviso = document.getElementById('aviso')
				aviso.innerHTML = 'Digite um CEP valido'

			} else{
				//retirando aviso caso exista
				if(document.getElementById('aviso')){
					document.getElementById('aviso').innerHTML = ''
				}

				//Colocando a resposta nos formulários
				document.getElementById('endereco').value = enderecoJSON.logradouro
				document.getElementById('bairro').value = enderecoJSON.bairro
				document.getElementById('cidade').value = enderecoJSON.localidade
				document.getElementById('uf').value = enderecoJSON.uf
			}
		}
		if(ajax.readyState == 4 && ajax.status == 400){
			alert('deu ruim mané')
		}

	}

	ajax.send()
}

