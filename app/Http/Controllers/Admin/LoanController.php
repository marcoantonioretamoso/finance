<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $loans = Loan::listView($request);
        }
        $loans = Loan::getLoans($request);
        return view('admin.loan.index', compact('loans'));
    }
    public function store(Request $request)
    {
        try{
            Loan::storeLoan($request);
            return response()->json(["codigo" => 0, 'mensaje' => 'Ciudad almacenado exitosamente', "data" => Loan::listView()]);
        }catch(\Exception $e){
            return response()->json(["codigo" => 1, 'mensaje' => $e->getMessage(), "data" => null]);
        }
    }
    public function update($id)
    {
        try{
            Loan::updateLoan($id);
            return response()->json(["codigo" => 0, 'mensaje' => 'Ciudad almacenado exitosamente', "data" => Loan::listView()]);
        }catch(\Exception $e){
            return response()->json(["codigo" => 1, 'mensaje' => $e->getMessage(), "data" => null]);
        }
    }
    public function destroy($id)
    {
        try{
            Loan::destroyLoan($id);
            return response()->json(["codigo" => 0, 'mensaje' => 'Ciudad almacenado exitosamente', "data" => Loan::listView()]);
        }catch(\Exception $e){
            return response()->json(["codigo" => 1, 'mensaje' => $e->getMessage(), "data" => null]);
        }
    }
}