<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Expense extends Model
{
    protected $table = 'expenses';

    protected $fillable = [
        'description',
        'amount',
        'status',
    ];
    const ACTIVO = 0;
    const ELIMINADO = 1;
    public static function listView(Request $request = null){
        $request = $request ?? request();
        $expenses = self::listadoGeneral($request); // Cambiamos a $incomes
        return view('admin.expense.table', compact('expenses'))->render();
    }

    public static function getExpenses(Request $request=null){
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

    public static function storeExpense($request){
        $expenses = new self();
        $expenses->description = $request->descripcion;
        $expenses->amount = $request->monto;
        $expenses->account_id = auth()->user()->selected_account;
        $expenses->save();
    }
    public static function updateExpense($id){
        $expenses = self::findOrFail($id);
        $expenses->description = request()->descripcion;
        $expenses->amount = request()->monto;
        $expenses->save();
    }
    public static function destroyExpense($id){
        $expenses = self::findOrFail($id);
        $expenses->status = self::ELIMINADO;
        $expenses->save();
    }
}