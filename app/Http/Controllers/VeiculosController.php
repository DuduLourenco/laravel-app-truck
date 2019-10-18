<?php

namespace App\Http\Controllers;

use App\Veiculo;
use App\MarcaVeiculo;
use Illuminate\Http\Request;

class VeiculosController extends Controller
{
    private $veiculo;
    private $marcaVeiculo;

    public function __construct(MarcaVeiculo $marcaVeiculo)
    {
        $this->marcaVeiculo = $marcaVeiculo;
        $this->veiculo = new Veiculo();
    }

    public function cadastroView()
    {        
        $list_marcas = $this->marcaVeiculo->all();
        return view('veiculo.cadastro', [
            'marcas' => $list_marcas
        ]);
    }
}
