
        //netflix
        var video = Array();

        video[1] = Array();
        video[1]['nome'] = 'Fullmetal Alchemist';
        video[1]['categoria'] = 'Anime';

        function getVideo(video) {
            //lógica

            try{
                //http -> erro
                //todo código passivo de erro fica nesse bloco
                console.log(video[0]['nome']); //erro que interrompe o processamento do script (não existeposição 0 no array)

            } catch (erro) {
                //é aqui que o erro é resolvido
                //recebe esse erro por parâmetro
                console.error('Mensagem de erro amigavel para o usuário: não foi possivel exibir o nome do vídeo inexistente');  

                tratarErro(erro);//função que vai mandar a mensagem técnica (string q representa o erro sendo capturada e apresentada) como paramentro


                //throw new Error('Houve um erro, desculpe o incomodo') //vai interromper a plicação parir dessa linha

            } finally{
                //É a finalização do tratamento do erro
                console.log('Sempre passa por aqui (try/catch)');

            }
            console.log('A aplicação não morreu');
            //Com esses 3 o script não é interrompido e esse console.log() é feito
        }

        function tratarErro(e) {
            //lógica para registrar o erro no servidor
            console.log(e);
        }

        getVideo(video);


