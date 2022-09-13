//import { saudacao, getEnderecoByCep } from './import/lib.mjs';

//Os módulos não são carregados de uma vez na página web, poupando tempo de carregamento
//Trabalhar com módulos sob demanda (dinâmico)

//abordagem com async/await
document.querySelector('#btnSaudacao').addEventListener('click', async () => {
    //retornar uma promise do módulo
    const modulo = await import('./import/lib.mjs');
    console.log(modulo.saudacao());
    
})

//abordagem com .then()
document.querySelector('#btnCep').addEventListener('click', () => {
    let cep = document.querySelector('#cep').value;

    if(cep.length == 8){
        import('./import/lib2.mjs')
            .then(module => {
                module.getEnderecoByCep('09771220').then(resp => console.log(resp));
            })       
    }
})