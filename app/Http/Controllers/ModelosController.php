<?php

namespace App\Http\Controllers;

use App\MarcaVeiculo;
use App\ModeloVeiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ModelosController extends Controller
{
    private $modelo;
    private $marcaVeiculo;

    public function __construct(MarcaVeiculo $marcaVeiculo)
    {
        $this->marcaVeiculo = $marcaVeiculo;
        $this->modelo = new ModeloVeiculo();
    }

    public function listModelosByIdMarca($idMarca)
    {
        $marca = $this->marcaVeiculo->find($idMarca);
        $modelos = $marca->getModelos()->getQuery()->get(['id','nmModelo']);
        return Response::json($modelos);
    }
}
