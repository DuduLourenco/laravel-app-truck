<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'cdUsuario',
        'nmUsuario',
        'cdCpfUsuario',
        'dtNascimentoUsuario',
        'nrTelefoneUsuario',
        'dsEmailUsuario',
        'nmSenhaUsuario'
    ];

    protected $table = 'tb_usuario';
}
