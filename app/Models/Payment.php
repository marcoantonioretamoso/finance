<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'amount',
        'loan_id',
        'status',
    ];
    const ACTIVO = 0;
    const ELIMINADO = 1;
    public static function storePayment($request){
        $payment = new Payment();
        $payment->amount = $request->monto;
        $payment->loan_id = $request->loand_id;
        $payment->save();
    }
}