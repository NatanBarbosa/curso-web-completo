/*
    Sintaxe
    while(<condição>){códigos a serem repetidos}
    enquanto essa condição for verdadeira esses códigos serão repitidos
*/

var x = 1;

while(x <= 10) {

    x++ //incremento de uma unidade
    if(x === 7){
        //break //vai interromper o laço de repetição imadiatamente apartir dessa linha
        continue //se true, ele vai pular essa etapa do laço de repetição. Se usado de forma errada pode gerar loops infinitos
    }

    console.log(x);
    //qnd x for 11 o laço ira parar
}