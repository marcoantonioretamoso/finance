<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function actualizarCuentaActual(Request $request)
    {
        try{
            User::UpdateUser($request);
            return response()->json(["codigo" => 0, 'mensaje' => 'Ciudad almacenado exitosamente', "data" => null]);
        }catch(\Exception $e){
            return response()->json(["codigo" => 1, 'mensaje' => $e->getMessage(), "data" => null]);
        }
    }
}