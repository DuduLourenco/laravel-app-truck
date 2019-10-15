<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [        
        'nmUsuario',
        'cdCpfUsuario',
        'dtNascimentoUsuario',
        'nrTelefoneUsuario',
        'dsEmailUsuario',
        'nmSenhaUsuario'
    ];

    protected $guarded = [
        'cdUsuario',
        'created_at',
        'updated_at'
    ];
    protected $table = 'tb_usuario';
}
