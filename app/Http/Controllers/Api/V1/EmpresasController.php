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

        $audits = $empresa->audits()
            ->join('users', 'users.id', '=', 'audits.user_id')
            ->select('audits.*', 'users.name', 'users.email')
            ->get();

        return response()->json([
            "empresa" => $empresa,
            "audits" => $audits,
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

        $empresa->nome_fantasia  = $request->nome_fantasia;
        $empresa->razao_social   = $request->razao_social;
        $empresa->cnpj           = $request->cnpj;
        $empresa->ie             = $request->ie;
        $empresa->im             = $request->im;
        $empresa->contato        = $request->contato;
        $empresa->telefone       = $request->telefone;
        $empresa->telefone2      = $request->telefone2;
        $empresa->celular        = $request->celular;
        $empresa->email          = $request->email;
        $empresa->endereco       = $request->endereco;
        $empresa->bairro         = $request->bairro;
        $empresa->cidade         = $request->cidade;
        $empresa->cep            = $request->cep;
        $empresa->ramo_atividade = $request->ramo_atividade;
        $empresa->porte          = $request->porte;
        $empresa->status         = $request->status;
        $empresa->observacao     = $request->observacao;

        $empresa->save();

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
