//O parâmetro de erro do catch não é mais obrigatório

//Antes
try{
    throw 'Houve um erro'
} catch (e) {
    console.log(e);
}

//Agora
try{
    throw 'Erro'
} catch {
    console.log('chegamos até aqui');
}