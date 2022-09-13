var lista_frutas = Array();

lista_frutas[0] = 'banana';
lista_frutas[1] = 'maçã';
lista_frutas[2] = 'morango';
lista_frutas[3] = 'uva';

var y = 0

while(y < lista_frutas.length) {
    //tem q ser menor pq nesse caso o y uma hora vai valer 4 e não tem posição 4 no nosso array
    console.log (lista_frutas[y])
    y++
}