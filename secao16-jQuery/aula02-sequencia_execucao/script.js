//disparar uma função desde que o DOM esteja totalmente carregado (para não dar problemas na sequencia de execução)
//Essa é a notação mais comum
$(document).ready( () => {
	//Tudo que está dentro dessa função é a codificação javascript/jQuery
	//que será somente execultada se .ready(), ou seja, se o document estiver pronto
	console.log('Método 1: ', $('#exemplo'))
} )		
			
			
//outro modo de fazer isso é:		
$(function () {
	console.log('Método 2: ', $('#exemplo'))
})

//ou
function teste(){
	console.log('Método 3: ', $('#exemplo'))
}

$(teste)		
			
		

		
		
		
		
		