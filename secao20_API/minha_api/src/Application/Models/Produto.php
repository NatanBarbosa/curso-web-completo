<?php

namespace App\Application\Models;
use Illuminate\Database\Eloquent\Model;

/*
 * Model (eloquent) é um ORM. Ele entende que Produto é uma classe que se refere a tabeal produtos, no db. Daí o get ele faz o select certinho
ex: Tabela usuarios -> Classe Usuario
carrinho_compras -> CarrinhoCompra

Produto::get() -> select
Produto::create($array) -> insert (created_at, updated_at preenchidos automaticamente);
::findOrFail(['parâmetro' => 'valor']) -> select where
::where('linha', 'coluna') -> select where
*/

class Produto extends Model
{

    //campos que podem ser salvos no banco de dados
    protected $fillable = [
        'titulo',
        'descricao',
        'preco',
        'fabricante',
        'updated_at',
        'created_at'
    ];
}