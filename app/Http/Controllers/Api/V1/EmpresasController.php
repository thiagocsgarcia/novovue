<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresa;

class EmpresasController extends Controller
{
    public function index()
    {
        $empresas = Empresa::orderBy('nome_fantasia', 'asc')->get();

        return response()->json([
            "empresas" => $empresas
        ], 200);
    }

    public function show($id)
    {
        $empresa = Empresa::findOrFail($id);

        return response()->json([
            "empresa" => $empresa
        ], 200);
    }

    public function store(Request $request)
    {
        $empresa = Empresa::create($request->all());

        return response()->json([
            "empresa" => $empresa
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->update($request->all());

        return response()->json([
            "empresa" => $empresa
        ], 202);
    }

    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();

        return response()->json(null, 204);
    }
}
