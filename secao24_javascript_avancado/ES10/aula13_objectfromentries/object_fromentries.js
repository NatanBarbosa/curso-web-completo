//converter array em objeto
//Em javascript, não há suporte para arrays associativos (que nem php). 
//Portanto, cada índice do array precisa conver como valor, um par chave valor, pra formar um objeto bonitinho

let dados = [
    ['nome', 'Natan Barbosa'],
    ['profissional', [
        ['site', 'natanbarbosa.net.br'],
        ['profissão', 'Programador']
    ]],
    ['hobbies', ['caminhar', 'nadar']],
    ['pais', 'Brasil']
];

let objDados = Object.fromEntries(dados);
console.log(objDados);