<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $expenses = Expense::listView($request);
        }
        $expenses = Expense::getExpenses($request);
        return view('admin.expense.index', compact('expenses'));
    }
    public function store(Request $request)
    {
        try{
            Expense::storeExpense($request);
            return response()->json(["codigo" => 0, 'mensaje' => 'Ciudad almacenado exitosamente', "data" => Expense::listView()]);
        }catch(\Exception $e){
            return response()->json(["codigo" => 1, 'mensaje' => $e->getMessage(), "data" => null]);
        }
    }
    public function update($id)
    {
        try{
            Expense::updateExpense($id);
            return response()->json(["codigo" => 0, 'mensaje' => 'Ciudad almacenado exitosamente', "data" => Expense::listView()]);
        }catch(\Exception $e){
            return response()->json(["codigo" => 1, 'mensaje' => $e->getMessage(), "data" => null]);
        }
    }
    public function destroy($id)
    {
        try{
            Expense::destroyExpense($id);
            return response()->json(["codigo" => 0, 'mensaje' => 'Ciudad almacenado exitosamente', "data" => Expense::listView()]);
        }catch(\Exception $e){
            return response()->json(["codigo" => 1, 'mensaje' => $e->getMessage(), "data" => null]);
        }
    }
}