<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Loan extends Model
{
    protected $table = 'loans';

    protected $fillable = [
        'description',
        'amount',
        'interest',
        'Balance',
        'account_id',
        'status',
    ];
    const ACTIVO = 0;
    const ELIMINADO = 1;
    public static function listView(?Request $request = null){
        $request = $request ?? request();
        $loans = self::listadoGeneral($request); // Cambiamos a $incomes
        return view('admin.loan.table', compact('loans'))->render();
    }

    public static function getLoans(?Request $request=null){
        $request = $request ?? request();
        return self::listadoGeneral($request);
    }
    public static function scopeListadoGeneral(Builder $query, ?Request $request = null)
    {
        $query->where('status', self::ACTIVO);

        if ($request && $request->has('buscador')) {  // Verifica que $request no sea null
            $buscador = $request->input('buscador');
            $query->where(function ($q) use ($buscador) {
                $q->orWhere('description', 'like', "%$buscador%")
                ->orWhere('monto', 'like', "%$buscador%");
            });
        }

        return $query->paginate(10);
    }

    public static function storeLoan($request){
        $income = new self();
        $income->description = $request->descripcion;
        $income->amount = $request->monto;
        $income->Balance = $request->monto;
        $income->account_id = auth()->user()->selected_account;
        $income->save();
    }
    public static function updateLoan($id){
        $income = self::findOrFail($id);
        $income->description = request()->descripcion;
        $income->amount = request()->monto;
        $income->save();
    }
    public static function destroyLoan($id){
        $income = self::findOrFail($id);
        $income->status = self::ELIMINADO;
        $income->save();
    }
}