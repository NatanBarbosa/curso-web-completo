//É POSSIVEL TRABALHAR COM UMA QUANTIDADE INDEFINIDA DE PARÂMETROS

function soma () {
    var resultado = 0;
    /*console.log(arguments);
    arguments: retorna algo parecido com um array. Se você for dando parâmetros para função
    ele vai armazenando esse parâmetros na posição 0, 1, 2... dentro dele. Assim da pra 
    trabalhar com uma quantidade de parâmetros indefinidos*/

    for(i in arguments){
        console.log(`valor ${arguments[i]} adicionado`)
        /*com isso podemos armazenar indefinidos parâmetros dentro do arguments e 
        percorrer esses parâmetros com um for-in*/

        resultado += arguments[i];
    }
    return 'soma dos valores: ' + resultado;
}

console.log(soma(7,5,7,4,1,20));

