<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'cdUsuario',
        'nmUsuario',
        'nmSobrenomeUsuario',
        'dtNascimentoUsuario',
        'nrTelefoneUsuario',
        'dsEmailUsuario'
    ];

    protected $table = 'tb_usuario';
}
