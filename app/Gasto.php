<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'dsTipo',
        'dsValor',
        'idUsuario',
        'dtGasto'
    ];

    protected $guarded = [
        'id'
    ];

    protected $table = 'tb_gasto';

    public function getGastos()
    {
        return $this->hasMany(ModeloVeiculo::class, 'idUsuario');
    }
}
