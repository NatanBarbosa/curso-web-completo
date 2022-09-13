// retorna um array enumerado com cada indice contendo os pares de cahve e valor. 0 = chave / 1 = valor
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

arr_obj = Object.entries(objeto);

console.log(arr_obj);