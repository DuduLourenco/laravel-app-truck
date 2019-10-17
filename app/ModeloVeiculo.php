<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModeloVeiculo extends Model
{
    protected $fillable = [        
        'nmModelo',
        'idMarca',
    ];

    protected $guarded = [
        'id',        
        'created_at',
        'updated_at'
    ];

    protected $table = 'tb_modelo_veiculo';

    public function getMarca()
    {
        return $this->belongsTo(MarcaVeiculo::class, 'idMarca');
    }
}


