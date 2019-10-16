<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModeloVeiculo extends Model
{
    protected $fillable = [        
        'nmModelo',
        'nnModelo',
        'cdMarca',
    ];

    protected $guarded = [
        'cdModelo',        
        'created_at',
        'updated_at'
    ];

    protected $table = 'tb_modelo_veiculo';
}


