<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{
    protected $fillable = [                
        'dsOrigemLat',
        'dsOrigemLng',
        'dsDestinoLat',
        'dsDestinoLng',
        'dsDistancia',
        'dsTempo',
        'dtPrazo',
        'hrPrazo',
        'dsGastos',
        'dsValor',
        'dsLucro',
        'dsStatus',
        'idUsuario',
        'idVeiculo'
    ];

    protected $guarded = [
        'id',        
        'created_at',
        'updated_at'
    ];

    protected $table = 'tb_viagem';
}
