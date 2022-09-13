/*o foreach é uma função e aguara como parâmentro uma função de callback
Essa função de callback aguarda três parâmetros: o valor, índice e o array (nessa ordem)
ele atua somente em valores numéricos partindo do zero*/

var listaFuncionarios = ['Cleiton','Cleber','Hamilton','Mariana','Josias','Muiékkk'];

console.log(listaFuncionarios)
listaFuncionarios.forEach(
    function(valor, indice, array){
        //é como um laço. 
        console.log('indice = ' + indice + ' | Valor = ' + valor) //Ele tem acesso aos índices do array e pode ir percorrendo eles
        //O valor tbm é passado para a função de callback através da lógica do foreach

        if(valor == 'Hamilton'){
            //exemplo de lógica para aplicar
            array[indice] = 'um novo valor'
            //Se o valor for Hamilton(array no indice equivalente ao valor Hamilton) ele será substituido por um novo valor
        }
        //console.log(array); //impresso a array completo 5 vezes
    }
    //Como os parâmetros são variáveis não é necessário passar todos eles
)

//Colocando a função do foreach dentro de uma variável(prática comum para funções de callback)
console.log(listaFuncionarios)

var listaFrutas = ['Maçã', 'Banana', 'Pera', 'Manga'];

var ListagemFrutas = function(valor, indice) {
    console.log(`fruta nº ${indice} é a ${valor}`)
}

listaFrutas.forEach(ListagemFrutas)

