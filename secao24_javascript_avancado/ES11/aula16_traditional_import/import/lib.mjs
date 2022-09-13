//extensão mjs: sinalizar que o arquivo é um módulo javascript que exporte funcionalidades (Não é um arquivo javascript convencional)
//Um script de módulos exporta funções para serem utilizadas em outros scripts
//No script que a função for utilizada, é necessário definir o type=module

export const saudacao = () => {
    let data = new Date().toLocaleDateString();
    return `Olá, seja muito bem vindo. Hoje é ${data}`;
};

export function getEnderecoByCep(cep){
    return fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(resp => resp.json());
}