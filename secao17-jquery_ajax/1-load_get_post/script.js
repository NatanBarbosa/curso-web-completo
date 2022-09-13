$(document).ready(() => {

    /*
    método load() 
    	request de uma nova página, substituindo pelo conteúdo referenciado, usando o método get
    	- parâmetro: url requisitada
    */
    $('#documentacao').on('click', () => {
        $('#pagina').load('paginas/documentacao.html')
    })

    /*
    método get()
		Faz uma request de uma nova página por meio do método GET 
		espera dois parâmetros
		- a url requisitada
		- uma ação (Recebe o responseText da url requisitada)
    */
    $('#suporte').on('click', () => {
        $.get('paginas/suporte.html', data => {
        	$('#pagina').html(data)
        })
    })

    /*
    método post()
		Faz uma request de uma nova página por meio do método POST 
		espera dois parâmetros
		- a url requisitada
		- uma ação (Recebe o responseText da url requisitada)
    */
    $('#index').on('click', () => {
    	$.post('paginas/home.html', data => {
    		$('#pagina').html(data)
    	})
    })

})