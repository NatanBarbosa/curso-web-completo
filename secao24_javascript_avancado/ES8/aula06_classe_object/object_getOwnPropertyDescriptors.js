//As propriedades de um objeto possuem metadados relacionados (descritores de propriedades) -> influneciam no corportamento
let objeto = {
    nome: 'Natan Rocha Barbosa',
    profissional: {
        site: 'natanbarbosa.net.br',
        profissao: 'Programador',
    },
    hobbies: [
        {id: 1, hobbie: 'fazer trilhas'},
        {id: 2, hobbie: 'dormir'},
    ],
    pais: 'Brasil'
};

/*
Descritores:
- writable: quando definido com false, indica que o valor da propriedade não poderá ser modificada 
- enumerable: quando definido com false, a propriedade em questão não é exibida em laços de repetição
- configurable: quando definido com false, indica que a propriedade não pdoe ser deletada
além disso, também não se pode mais alterar os descritores (com exceção com writable para false)
*/

//writable
Object.defineProperty(objeto, 'nome', {
    value: 'Natan Rocha Barbosa',
    writable: false,
});

console.log(Object.getOwnPropertyDescriptors(objeto));

console.log('________________________________');

//enumerable -> o atributo hobbies e profissional não vai passar no array
Object.defineProperty(objeto, 'hobbies', {
    enumerable: false
});

Object.defineProperty(objeto, 'profissional', {
    enumerable: false
});

for(let propriedade in objeto){
    console.log(propriedade, objeto[propriedade]);
}

console.log('________________________________');

//configurable
Object.defineProperty(objeto, 'pais', {
    configurable: false
})
console.log(Object.getOwnPropertyDescriptors(objeto));

console.log(delete objeto.pais); //retorna false pq não conseguiu deletar eessaessa propriedade
Object.defineProperty(objeto, 'pais', {
    enumerable: false,
    configurable: true
}) //não consegue redefinir e da erro no console 

Object.defineProperty(objeto, 'pais', {
    writable: false
}) //esse ele consegue

console.log(Object.getOwnPropertyDescriptors(objeto));