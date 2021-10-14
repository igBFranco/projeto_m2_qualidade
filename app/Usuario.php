<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //Definindo os atributos iniciais
    protected $fillable = ['nome_usr','cpf_cnpj_usr','fone_usr','email_usr','senha_usr','categoria_usr'];
}
