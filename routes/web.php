<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\PaymentController;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(Auth::check()){
        return redirect()->route('index');
    } else{
        return redirect()->route('login');
    }
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', function () {
        if (Auth::check()) {
            return redirect()->route('index');
        } else {
            return view('admin.auth.login');
        }
    })->name('login');
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware(['auth'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::get('/consultar-graficas-dashboard', [DashboardController::class, 'consultarGraficas'])->name('consultar-graficas-dashboard');
        //incomes
        Route::group(['prefix' => 'incomes'], function () {
            Route::get('/', [IncomeController::class, 'index'])->name('incomes.index');
            Route::post('/store', [IncomeController::class, 'store'])->name('incomes.store');
            Route::post('/update/{id}', [IncomeController::class, 'update'])->name('incomes.update');
            Route::post('/destroy/{id}', [IncomeController::class, 'destroy'])->name('incomes.destroy');
        });
        //expenses
        Route::group(['prefix' => 'expenses'], function () {
            Route::get('/', [ExpenseController::class, 'index'])->name('expenses.index');
            Route::post('/store', [ExpenseController::class, 'store'])->name('expenses.store');
            Route::post('/update/{id}', [ExpenseController::class, 'update'])->name('expenses.update');
            Route::post('/destroy/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
        });
        Route::group(['prefix' => 'payments'], function () {
            // Route::get('/', [LoanController::class, 'index'])->name('loans.index');
            Route::post('/store', [PaymentController::class, 'store'])->name('loans.store');
            // Route::post('/update/{id}', [LoanController::class, 'update'])->name('loans.update');
            // Route::post('/destroy/{id}', [LoanController::class, 'destroy'])->name('loans.destroy');
        });
        Route::group(['prefix' => 'loans'], function () {
            Route::get('/', [LoanController::class, 'index'])->name('loans.index');
            Route::post('/store', [LoanController::class, 'store'])->name('loans.store');
            Route::post('/update/{id}', [LoanController::class, 'update'])->name('loans.update');
            Route::post('/destroy/{id}', [LoanController::class, 'destroy'])->name('loans.destroy');
        });
        Route::post('actualizar/cuentaActual', [AccountController::class, 'actualizarCuentaActual'])->name('actualizar/cuentaActual');
    });
});