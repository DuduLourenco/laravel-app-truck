<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = [                
        'nmModelo',
        'cdModelo'
    ];

    protected $guarded = [
        'cdMarca',        
        'created_at',
        'updated_at'
    ];

    protected $table = 'tb_marca_veiculo';
}
