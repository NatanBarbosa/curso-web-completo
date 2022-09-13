var lista_frutas = ['Maçã', 'Uva', 'Banana','Morango'];

//.sort -> faz uma ordenação alfanumérica dos elementos e reajusta seus respectivos índices
console.log(lista_frutas.sort());

//.sort -> não faz a ordenação numérica desses números, apenas do primeiro caracter
/*Para fazer a ordenação numérica é necessário criar uma função que recebe a e b como parâmetro e subtraia eles  e
 dps colocar essa função como parâmetro para o sort*/

var lista_numeros = [5,9,502,50,30,19,100];
console.log(lista_numeros.sort(ordenaNumeros));
//A função ordenaNumeros será executada dentro do método sort

function ordenaNumeros(a, b) {
    return a - b
    /*Nessa função ele testará todos elementos do array e os ordenará e se um número for inferior ao outro ele
    ficará negativo, fazendo com que o begativo seja ordenado primeiro que o positivo
    < 0 = a ordenado antes de b
    > 0 = b ordenado antes de a
    == = a ordem é mantida
    */
}

