//var listaConvidados = ['Jorge', 'Jamilton', 'José', 'Ana', 'Maria']

var listaConvidados = Array();
listaConvidados['a'] = 'Jorge';
listaConvidados[10] = 'Jamilton';
listaConvidados['zebra'] = 'José';
listaConvidados[-1] = 'Ana';
listaConvidados[true] = 'Maria';


for(var x in listaConvidados) {
    //O in vai percorrer até o final do Array. O critério de parada é o retorno de undefined(final do nosso array)
    //conforme ele percorre 1 elemento do Array o x = o valor do índice (numérico ou array)
    //O for in é bom para quando o array não tem indices sequenciais(0,1,2,3,4,etc...)
    console.log(`Índice ${x} | Elemento ${listaConvidados[x]}`);
}