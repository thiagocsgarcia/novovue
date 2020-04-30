<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vaga;

class VagasController extends Controller
{
    public function index()
    {
        $vagas = Vaga::all();

        return response()->json([
            "vagas" => $vagas
        ], 200);
    }

    public function show($id)
    {
        $vaga = Vaga::findOrFail($id);

        return response()->json([
            "vaga" => $vaga,
        ], 200);
    }

    public function store(Request $request)
    {
        $vaga = Vaga::create($request->all());

        return response()->json([
            "vaga" => $vaga
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $vaga = Vaga::findOrFail($id);

        $vaga->update($request->all());

        return response()->json([
            "vaga" => $vaga
        ], 202);
    }

    public function destroy($id)
    {
        $vaga = Vaga::findOrFail($id);

        $vaga->delete();

        return response()->json(null, 204);
    }
}
