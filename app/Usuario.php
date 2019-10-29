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
        'id',
        'created_at',
        'updated_at'
    ];
    protected $table = 'tb_usuario';

    public function listVeiculos()
    {
        return $this->hasMany(Veiculo::class, 'idUsuario', 'id');
    }

    public function listViagens()
    {
        return $this->hasMany(Viagem::class, 'idUsuario', 'id');
    }
}
