<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarcaVeiculo extends Model
{
    protected $fillable = [                
        'nmMarca'
    ];

    protected $guarded = [
        'id',        
        'created_at',
        'updated_at'
    ];

    protected $table = 'tb_marca_veiculo';

    public function getModelos()
    {
        return $this->hasMany(ModeloVeiculo::class, 'idMarca');
    }

}
