//Encadeamento opcional: verificar a existência de um atributo dentro de um objeto antes de disparar a validação do javascript

//Orçamento pessoal
let obj = {
    2021: {
        janeiro: {
            pessoal: 2000,
            casa: 1500,
            investimento: 1000
        },
        fevereiro: {
            pessoal: 1800,
            casa: 1600,
            investimento: 800
        }
    }
};



console.log(obj['2021'].marco?.pessoal); 
//undefined.marco -> testar se o attr marco existe colocando ? dps do attr 
//Caso não exista, ele exibe undefined

console.log('teste');