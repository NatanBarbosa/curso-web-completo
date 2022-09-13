//Laços de repetição com bases em processamentos assíncronos
//Só seguir para a próxima repetição quando o processamento assíncrono for conclído
let processos = [1, 2, 3, 4, 5];

let interacaoAssincrona = async () => {
    for (let processo of processos) {
        //processamentos assíncronos
        await new Promise((resolve, reject) => {
            setTimeout(() => {
                console.log('Processamento assíncrono...');
                resolve();
            }, 2000);
        })

        console.log(processo);
    }
}

interacaoAssincrona();