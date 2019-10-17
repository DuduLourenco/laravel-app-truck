<?php

namespace App\Http\Controllers;

use App\MarcaVeiculo;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    private $marca;

    public function __construct()
    {
        $this->marca = new MarcaVeiculo();
    }

    public function listAll()
    {
        return $this->marca->all();
    }
}
