<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AuditsController extends Controller
{
    public function index()
    {
        $audits = DB::table('audits')
            ->select('audits.*', 'empresas.razao_social', 'users.name', 'users.email')
            ->join('users', 'users.id', '=', 'audits.user_id')
            ->join('empresas', 'empresas.id', '=', 'audits.auditable_id')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json(["audits" => $audits], 200);
    }
}
