//Generators são funções especiais que podem ser executadas, pausadas e continuadas qnd quiser

function* testeGenerator(){
    yield 'Teste 1';
    yield 'Teste 2'; 
    yield 'Teste 3';

    return 'Teste 4';
}

let meuGenerator = testeGenerator(); //variável recebe obj interator


console.log(meuGenerator.next());//executa até o 1º yield

console.log('-----------');

console.log(meuGenerator.next());//executa até o 2º yield

console.log('-----------');

console.log(meuGenerator.next());//executa até o 3º yield

console.log('-----------');

console.log(meuGenerator.next());//executa até o 4º yield - done (final da execução do generator)
