function calcular(tipo, valor) {
    //tipo: alguns botões podem representar valores e outros ações
    //valor: a string ou número q ele representa
    
    //vefiricar se estamos trabalhando com uma ação ou valor
    var result = document.getElementById('resultado')
    if(tipo === 'acao'){
        if( valor === 'c'){
            //se o botão apertado for o c(clear) ele limpa o visor
            result.value = ''
        }

        if(valor === '+' || valor === '-' || valor === '*' || valor === '/' || valor === '.'){
            //se o valor for qualquer um desse de cima

            result.value += valor
            //vai pegar esses botões de ação e concatenar com o .value do visor**
        }

        if (valor === '='){
            valor_final = eval(result.value)
            //retorna o valor string do result(só q esse valor string é uma operação matemática no interpretador javascript válida)
            //a função eval transorma strings em operações matemáticas no contexto do interpretador javascript

            document.getElementById('resultado').value = valor_final
        }

    } else if(tipo === 'valor') {
        
        result.value += valor
        //seleciona o valor do input que mostra os números e atribui ele msm + o valor do botão para ele**
    }

}

//**nota: com esses dois comandos principais a construção das strings do calculo já está completa