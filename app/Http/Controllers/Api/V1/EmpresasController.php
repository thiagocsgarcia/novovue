<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresa;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Empresa::orderBy('nome_fantasia', 'asc')->get();
    }
 
    public function show($id)
    {
        return Empresa::findOrFail($id);
    }
 
    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->update($request->all());
 
        return $empresa;
    }
 
    public function store(Request $request)
    {
        $empresa = Empresa::create($request->all());
        return $empresa;
    }
 
    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();
        return '';
    }
}

