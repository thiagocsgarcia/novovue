<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    protected $fillable = ['nome_fantasia', 'razao_social', 'cnpj', 'ie', 'im', 'contato', 'telefone', 'telefone2', 'celular', 'email', 'endereco', 'bairro', 'cidade', 'cep', 'ramo_atividade', 'porte', 'observacao', 'status'];
}
