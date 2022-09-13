//atributo privado referenciado por #
//um attr ou método privado não pode ser acessado fora do escopo da classe
class Pessoa {
    //attr privado
    #humor = null;
    #mensagens = [
        'Seja feliz',
        'Não estou para conversa hoje >:('
    ]

    constructor(nome){
        this.nome = nome;
        this.#mudarHumor();
    }

    dizerOi(){
        return `Olá! Meu nome é ${this.nome}`;
    }

    getHumor(){
        return this.#humor;
    }

    //método privado
    #mudarHumor(){
        this.#humor = Math.floor(Math.random() * 2)
    }

    getMensagem(){
        return this.#mensagens[this.#humor];
    }
}

let p = new Pessoa('José');
console.log(p.dizerOi());
console.log(p.getMensagem());