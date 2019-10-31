<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InscricaoCurso;

class InscricoesCursosController extends Controller
{
    public function index()
    {
        $inscricoes = InscricaoCurso::all();

        return response()->json([
            "inscricoes" => $inscricoes
        ], 200);
    }

    public function show($id)
    {
        $inscricao = InscricaoCurso::findOrFail($id);

        return response()->json([
            "inscricao" => $inscricao
        ], 200);
    }

    public function store(Request $request)
    {
        $inscricao = InscricaoCurso::create($request->all());

        return response()->json([
            "inscricao" => $inscricao
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $inscricao = InscricaoCurso::findOrFail($id);

        $inscricao->update($request->all());

        return response()->json([
            "inscricao" => $inscricao
        ], 202);
    }

    public function destroy($id)
    {
        $inscricao = InscricaoCurso::findOrFail($id);
        $inscricao->delete();

        return response()->json(null, 204);
    }
}
