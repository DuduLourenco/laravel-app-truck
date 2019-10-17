<?php

namespace App\Http\Controllers;

use App\Veiculo;
use Illuminate\Http\Request;

class VeiculosController extends Controller
{
    private $veiculo;

    public function __construct()
    {
        $this->veiculo = new Veiculo();
    }

    public function cadastroView()
    {        
        return view('veiculo.cadastro');
    }

}
