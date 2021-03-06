<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'Api\V1', 'middleware' => ['auth:api']], function () {
    Route::resource('empresas', 'EmpresasController', ['except' => ['create', 'edit']]);

    Route::get('audits', 'AuditsController@index');

    Route::resource('inscricoes-cursos', 'InscricoesCursosController', ['except' => ['create', 'edit']]);

    Route::resource('vagas', 'VagasController', ['except' => ['create', 'edit']]);
});
