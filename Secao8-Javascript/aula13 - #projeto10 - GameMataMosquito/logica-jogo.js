//-------------------------------------algumas variáveis--------------------------------------

var vidas = 1
var altura = 0
var largura = 0
var tempo = 15

//------------------------Extrair o nível encaminhado como parâmetro para página app.html, que possui logica-jogo.js---------------------------------

var nivel = window.location.search //retorna tudo que está a direita do ponto de interrogação + o proprio ?

var criaMosquitoTempo = 1500

if(nivel === '?normal'){
    //tempo de desaparecimento da mosca = 1500
    criaMosquitoTempo = 1500

} else if(nivel === '?dificil'){
    //tempo de desaparecimento da mosca = 1000
    criaMosquitoTempo = 1000

} else if(nivel === '?escanor'){
    //tempo de desaparecimento da mosca = 750
    criaMosquitoTempo = 750
}

//-------------------------------Pegando o tamanho máximo da tela--------------------------------------

function ajustaTamanho() {
    //se o usuário redimensionar a tela as informações de altura e largura tem que ser atualizadas
    altura = window.innerHeight
    largura = window.innerWidth

    console.log('Largura máxima da tela: ' + ' X: ' + largura + ' Y: ' +  altura)
    //com isso(+ onresize) as dimensões do documento são constantemente atualizadas
}

ajustaTamanho()

//---------------------------- Criando o cronômetro------------------------------------------

//var tempo = 5
document.getElementById('timer').innerHTML = tempo //fazendo o tempo começar do começo

var cronometro = setInterval(
    function () {
        tempo--
        if(tempo < 0){
            clearInterval(cronometro) //qnd o tempo acabar ele limpa o cronômetro

            clearInterval(criaMosquito) //qnd o tempo acabara função coração do app para de ser esecultada la em baixo

            window.location.href = 'voce_venceu.html'
        } else{
            document.getElementById('timer').innerHTML = tempo
            //innerHTML - texto entre as tags vai ser a variavel tempo
        }
    },1000
)

//---------------------------- Coração do game------------------------------------------

function posicaoRandomica() {

    //---------------------------- Remover o mosquito anterior(caso exista) e tirar vida------------------------------------------
    //qnd tem o primeiro carregamento da pág html não tem nenhum mosquito em cena
    if(document.getElementById('mosquito')){ //caso haja um retorno de um elemento selecionado no navegador...
        document.getElementById('mosquito').remove() //vai remover o elemento selecionado

        if(vidas > 3){
            //se o vidas for >3 significa que ele deixou de pegar 3 mosquitos e perdeu
            window.location.href = 'fim_de_jogo.html'
        } else{
            document.getElementById('v' + vidas).src = "imagens/coracao_vazio.png"
            vidas++
            /*conforme ele entre nessa condição o "vidas" ganha +1, então ai ele consegue selecionar o 2 e o v3 na
            proxima vez q entrar*/
        }

    }

    //------------------------------ Preparando posição do mosquito ---------------------------------------------------

    /*
    O primeiro passo é encontrar a largura e a altura da página para que haja
    um limite(tamanho do documento(sem barra de ferramentas)) na hora de definir posições randomicas para o mosquito.
    Se esses limites não existirem o mosquito pode nascer em um canto muito esquerdo da página, criando uma barra
    de rolagem.
     */


    var posicaoX = Math.floor(Math.random() * largura) - 90
    var posicaoY = Math.floor(Math.random() * altura) - 90 //subtrai 90 para a imagem não passar do limite
    /*
    O Math.random gera valores aleatórios de 0 à 1. Multiplicando ele pelas dimensões da tela é possivel obter valores
    aleatórios dentro da área do documento(pois o valor máximo do Math.random vai ser 1, que multiplicado pela altura
    ou largura vai dar o valor máximo dela ou menor).
    */

    posicaoX = posicaoX < 0 ? 0 : posicaoX //se posicaoX for < 0 ele vai retornar 0, senão retorna ela mesma
    posicaoY = posicaoY < 0 ? 0 : posicaoY
    /*
        Se o Math.random der zero será subtraido 90px da posição, fazendo o mosquito desaparecer da tela pois ele terá
        top e left negativos(-90px).
    */


    console.log('Posição do mosquito: ' + ' X: ' + posicaoX + ' Y: ' +  posicaoY)

    //------------------------------ Criando elemento html dinamicamente --------------------------------------------

    var mosquito = document.createElement('img') //criando a tag imagem

    mosquito.src = 'imagens/mosca.png' //adicionando um src (procurar img) na tag img
    mosquito.className = tamanhoAleatorio() + ' ' + ladoAleatorio()/*concatenar com um espaço para o interpretador
    entender que são classes diferentes*/

    /*atribuindo a classe que redimensiona o mosquito retornada no switch de baixo | Atribuindo a casse que inverte o
    lado do mosquito, definido no switch abaixo ao do de baixo*/

    mosquito.style.left = posicaoX + 'px'
    mosquito.style.top = posicaoY + 'px'
    /*
    Atribuindo os valores de posição randomica no estilo (É usado top e left pq esses dois, qnd o valor é 0, eles são
    o início da página(canto superior direito))
    Tbm foi definido position absolute no style para os valores top e left funcionarem
    */

    mosquito.id = 'mosquito' //aplicando um id q vai ajudar a remover o mosquito anterior

    mosquito.onclick = function(){ //criando evento onclick
        this.remove()
        //o operador this percebe que essa função está associada ao mosquito
        /*
         se removermos o elemento clicando antes do proximo elemento ser criado aquele if de cima que faz perder vida
         não irá ser true
         */
    }

    document.body.appendChild(mosquito) //acessando o body da página para deixar a imagem dentro do body


    //------------------------------ Criando tamanhos aleatórios ---------------------------------------------------

    function tamanhoAleatorio() {
        var classe = Math.ceil(Math.random() * 3) //resultados entre 1 e 3 (pois arredonda pra cima)

        switch(classe){
            case 1:
                return 'mosquito1'

            case 2:
                return 'mosquito2'

            case 3:
                return 'mosquito3'
            //qnd o comando é return (dentro de função) o switch é imediatamente interrompido (sem necessitar do return)
        }
        /*
        Com isso essa função será chamada na hora de atribuir uma classe de redimensionamento do mosquito la em cima na
         hora de aplicar um className
         */
    }

    //------------------------------ Criando lados aleatórios ---------------------------------------------
    function ladoAleatorio() {
        var lado = Math.ceil(Math.random() * 2) //resultados entre 1 e 2 (pois arredonda pra cima)

        switch(lado){
            case 1:
                return 'ladoA'

            case 2:
                return 'ladoB'
        }
        //mesma lógica do de cima
    }
}

//------------------------------Aplicando a criação randomica do mosquito periodicamente------------------------------
var criaMosquito = setInterval(
    function () {
        posicaoRandomica()
    }, criaMosquitoTempo
)
//criaMosquitoTempo será o tempo de desaparecimento do mosquito definido acima(set interval)
/*com isso a cada um segundo ele vai executar toda a função gigante de cima responsavel por pegar as dimensões da
tela, posicionar o mosquito, redimensiona-lo e mudar sua escala.*/