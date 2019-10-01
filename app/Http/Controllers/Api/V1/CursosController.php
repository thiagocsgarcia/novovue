<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Curso;

class CursosController extends Controller
{
    public function index()
    {
        $cursos = Curso::select("curso_interesse")->distinct()->get();
        $inscricoes = Curso::all();

        return response()->json([
            'cursos'     => $cursos,
            'inscricoes' => $inscricoes,
        ], 200);
    }

    public function show($id)
    {
        return Curso::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->update($request->all());
        return $curso;
    }

    public function store(Request $request)
    {
        $curso = Curso::create($request->all());
        return $curso;
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();
        return '';
    }
}
