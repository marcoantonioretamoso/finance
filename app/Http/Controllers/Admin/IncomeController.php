<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $incomes = Income::listView($request);
        }
        $incomes = Income::getIncomes($request);
        return view('admin.income.index', compact('incomes'));
    }
    public function store(Request $request)
    {
        try{
            Income::storeIncome($request);
            return response()->json(["codigo" => 0, 'mensaje' => 'Ciudad almacenado exitosamente', "data" => Income::listView()]);
        }catch(\Exception $e){
            return response()->json(["codigo" => 1, 'mensaje' => $e->getMessage(), "data" => null]);
        }
    }
    public function update($id)
    {
        try{
            Income::updateIncome($id);
            return response()->json(["codigo" => 0, 'mensaje' => 'Ciudad almacenado exitosamente', "data" => Income::listView()]);
        }catch(\Exception $e){
            return response()->json(["codigo" => 1, 'mensaje' => $e->getMessage(), "data" => null]);
        }
    }
    public function destroy($id)
    {
        try{
            Income::destroyIncome($id);
            return response()->json(["codigo" => 0, 'mensaje' => 'Ciudad almacenado exitosamente', "data" => Income::listView()]);
        }catch(\Exception $e){
            return response()->json(["codigo" => 1, 'mensaje' => $e->getMessage(), "data" => null]);
        }
    }
}