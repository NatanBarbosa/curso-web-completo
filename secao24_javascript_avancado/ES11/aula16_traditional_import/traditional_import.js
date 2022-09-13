//Carregando o módulo antes da necessidade de utiliza-los (estático)
import { saudacao, getEnderecoByCep } from './import/lib.mjs';

console.log(saudacao());
getEnderecoByCep('09771220').then(resp => console.log(resp));
