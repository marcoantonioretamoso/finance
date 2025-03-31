<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        try{
            $loan = Loan::findOrFail($request->loand_id);
            if($request->monto > $loan->Balance){
                return response()->json(["codigo" => 1, 'mensaje' => 'Monto excedido', "data" => null]);
            }
            Payment::storePayment($request);
            $loan->Balance = $loan->Balance - $request->monto;
            if($loan->Balance == 0){
                $loan->status = 1;
            }
            $loan->update();
            return response()->json(["codigo" => 0, 'mensaje' => 'Ciudad almacenado exitosamente', "data" => Loan::listView()]);
        }catch(\Exception $e){
            return response()->json(["codigo" => 1, 'mensaje' => $e->getMessage(), "data" => null]);
        }
    }
}