//Pegar propriedades de um objeto e converter informações em um array. Os atributos viram valores numéricos sequenciais
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

console.log(objeto);

arr_obj = Object.values(objeto);

console.log(arr_obj);