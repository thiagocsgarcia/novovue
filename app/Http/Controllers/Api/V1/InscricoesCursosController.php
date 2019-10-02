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

        return response()->json($inscricoes, 200);
    }

    public function show($id)
    {
        return InscricaoCurso::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $curso = InscricaoCurso::findOrFail($id);
        $curso->update($request->all());
        return $curso;
    }

    public function store(Request $request)
    {
        $curso = InscricaoCurso::create($request->all());
        return $curso;
    }

    public function destroy($id)
    {
        $curso = InscricaoCurso::findOrFail($id);
        $curso->delete();
        return '';
    }
}
