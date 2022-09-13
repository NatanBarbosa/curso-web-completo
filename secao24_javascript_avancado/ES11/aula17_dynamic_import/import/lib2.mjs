export function getEnderecoByCep(cep){
    return fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(resp => resp.json());
}