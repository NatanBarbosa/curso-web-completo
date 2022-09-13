function* conversar(){
    //1º bloco
    let opcao = yield 'eai? tudo bem?'; //1º next / recebver parâmetro do 2º next

    //2º bloco
    if(opcao === 'sim'){
        yield 'Ótimo, fico feliz'; //2º next

        opcao = yield 'Como eu posso te ajudar? Quer uma piada para começar'; //3º next e receber parâmetro no 4º next

        if(opcao === 'sim'){
            //4º next
            fetch('dados/piadas.json')
                .then(response => response.json())
                .then(piadas => {
                    let idx = Math.floor(Math.random() * 10);
                    let piada = piadas[idx];

                    console.log(piada.piada);

                    setTimeout(() => {
                        console.log(piada.resposta);
                        console.log('kkkkkkkk, muito boa, né?');
                    }, 2000);
                });

                yield 'Digite: \n 1 para compras \n 2 para vendas \n 3 para falar com um atendente'; //5º next
        } else {
            yield 'Digite: \n 1 para compras \n 2 para vendas \n 3 para falar com um atendente'; //4º next
        }
        

    } else {
        yield 'Respire fundo e tenha paciência'; //2º next

        yield 'Digite: \n 1 para compras \n 2 para vendas \n 3 para falar com um atendente'; //3º next
    }

    return 'Atendimento finalizado' //ultimo next
    
}

let conversa = conversar(resposta); 

//a cada execução, ele da um next no interator
function acao(){

    let resposta = document.getElementById('resposta').value

    let interacao = conversa.next(resposta);  //vai executar tudo até o yield e vai aguardar um proximo next para receber parâmetro
    console.log(interacao);

    if(interacao.done){
        document.getElementById('teste').style.display = 'none'
    }
}
