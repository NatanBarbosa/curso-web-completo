//retorna uma string que representa aquele objeto. Qlqr objeto javascript terá o metodo tostring

class Carro {
    constructor(marca, modelo, ano){
        this.marca = marca;
        this.modelo = modelo;
        this.ano = ano;
    }

    //Descrição desse objeto
    toString(){
        return `Carro da marca ${this.marca}, modelo ${this.modelo}, ano ${this.ano}`;
    }
}

let carro = new Carro('Jeep', 'Renegade', 2021);

console.log(carro.toString());
console.log(Math.toString());
// retorna [object Type] caso não seja sobrescrito no objeto