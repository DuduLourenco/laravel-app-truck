<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(["prefix" => "/usuarios"], function () {
    Route::get("/login", "UsuariosController@loginView");
    Route::get("/cadastro", "UsuariosController@cadastroView");
    Route::post("/entrar", "UsuariosController@entrar");
    Route::post("/cadastrar", "UsuariosController@cadastrar");
    Route::post("/verificaLogado", "UsuariosController@verificaLogado");
    Route::get("/alterarDados", "UsuariosController@alterarView");
    Route::get("/relatorio", "UsuariosController@relatorioView");
    Route::get("/listarViagens/{cpf}", "UsuariosController@listarViagensByCpf");
    Route::post("/alterar", "UsuariosController@alterar");
    Route::get("/cofrinho", "UsuariosController@cofrinhoView");
});


Route::group(["prefix" => "/"], function () {
    Route::get("/", "PrincipalController@principalView");
    Route::get("/teste", "TesteController@viewOpen");

});

Route::group(["prefix" => "/viagens"], function () {
    Route::get("/", "ViagensController@viagemView");
    Route::post("/confirmar", "ViagensController@viagemConfirmacaoView");
    Route::post("/cadastrar", "ViagensController@cadastrar");
});

Route::group(["prefix" => "/veiculos"], function () {
    Route::get("/cadastro", "VeiculosController@cadastroView");
    Route::post("/cadastrar", "VeiculosController@cadastrar");
    Route::any("/listar/{id}", "VeiculosController@listVeiculosByIdUsuario");
    Route::any("/findByPlaca/{id}", "VeiculosController@findByPlaca");
    Route::any("/findById/{id}", "VeiculosController@findById");

    Route::group(["prefix" => "/modelos"], function () {
        Route::get("/listModelos/{id}", "ModelosController@listModelosByIdMarca");
        Route::any("/findMarca/{id}", "ModelosController@findMarcaByIdModelo");
    });
});

Route::get("/maps", "maps@index");

Route::get("/listModelos/{id}", "ModelosController@listModelosByIdMarca");





