<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }
    public function consultarGraficas(){
        $carteraIngresos = self::consultarIngresos();
        $carteraEgresos = self::consultarEgresos();
        $carteraPrestamo = self::consultarPrestamo();
        $montoIngresoActual = self::montoIngresoActual();
        $montoEgresoActual = self::montoEgresoActual();
        $montoPrestamoActual = self::montoPrestamoActual();

        $montoIngresoTotal = self::montoIngresoTotal();
        $montoEgresoTotal = self::montoEgresoTotal();
        $montoTotalPrestamo  = self::montoPrestamoTotal();
        $montoTotalAcumulado = self::montoTotalAccountInt() + $montoIngresoTotal - $montoEgresoTotal - $montoTotalPrestamo;
        // dd([
        //     'montoTotalAcumulado' => $montoTotalAcumulado,
        //     'montoIngresoActual' => $montoIngresoActual,
        //     'montoEgresoActual' => $montoEgresoActual,
        //     'montoPrestamoActual' => $montoPrestamoActual
            
        // ]);
        return response()->json(
            [
                'codigo' => 0, 
                'data' => [
                    'ingresos' => $carteraIngresos,
                    'egresos' => $carteraEgresos,
                    'prestamos' => $carteraPrestamo,
                    'montoIngresoActual' => $montoIngresoActual,
                    'montoEgresoActual' => $montoEgresoActual,
                    'montoTotalAcumulado' => $montoTotalAcumulado,
                    'montoPrestamoActual' => $montoPrestamoActual
                ]
            ]
        );
    }
    public function montoEgresoTotal($status = 0)
    {
        $cuentaId = auth()->user()->selected_account; // Obtiene la cuenta seleccionada del usuario
    
        return DB::table('expenses')
            // ->when($status, function($query) use ($status) {
            //     return $query->where('status', $status);
            // })
            ->where('status',0)
            ->where('account_id', $cuentaId) // Filtra por la cuenta del usuario
            ->sum('amount');
    }
    public function montoPrestamoTotal($status = 0)
    {
        $cuentaId = auth()->user()->selected_account; // Obtiene la cuenta seleccionada del usuario
    
        return DB::table('loans')
            // ->when($status, function($query) use ($status) {
            //     return $query->where('status', $status);
            // })
            ->where('status',0)
            ->where('account_id', $cuentaId) // Filtra por la cuenta del usuario
            ->sum("Balance");
    }
    public function montoIngresoTotal($status = 0)
    {
        $cuentaId = auth()->user()->selected_account;
        return DB::table('incomes')
            // ->when($status, function($query) use ($status) {
            //     return $query->where('status', $status);
            // })
            ->where('status',0)
            ->where('account_id', $cuentaId)
            ->sum('amount');
    }
    // public static function montoIngresoActual()
    // {
    //     $mesActual = date('n'); // Obtiene el número del mes actual (1-12)
    //     $anioActual = date('Y'); // Obtiene el año actual

    //     return DB::table('incomes') // Asumo que tu tabla se llama 'ingresos'
    //         ->whereMonth('created_at', $mesActual) // Filtra por mes actual
    //         ->whereYear('created_at', $anioActual) // Filtra por año actual
    //         ->where('status', 0)
    //         ->where('account_id', auth()->user()->selected_account)
    //         ->sum('amount'); // Asumo que el campo se llama 'monto'
    // }

    // public static function montoEgresoActual()
    // {
    //     $mesActual = date('n'); // Obtiene el número del mes actual (1-12)
    //     $anioActual = date('Y'); // Obtiene el año actual

    //     return DB::table('expenses') // Asumo que tu tabla se llama 'egresos'
    //         ->whereMonth('created_at', $mesActual) // Filtra por mes actual
    //         ->whereYear('created_at', $anioActual) // Filtra por año actual
    //         ->where('status', 0)
    //         ->where('account_id', auth()->user()->selected_account)
    //         ->sum('amount'); // Asumo que el campo se llama 'monto'
    // }
    // public static function montoPrestamoActual()
    // {
    //     $mesActual = date('n'); // Obtiene el número del mes actual (1-12)
    //     $anioActual = date('Y'); // Obtiene el año actual

    //     return DB::table('loans') // Asumo que tu tabla se llama 'egresos'
    //         ->whereMonth('created_at', $mesActual) // Filtra por mes actual
    //         ->whereYear('created_at', $anioActual) // Filtra por año actual
    //         ->where('status', 0)
    //         ->where('account_id', auth()->user()->selected_account)
    //         ->sum('Balance'); // Asumo que el campo se llama 'monto'
    // }
    public function montoIngresoActual()
    {
        $mesActual = date('n'); // Mes actual
        $anioActual = date('Y'); // Año actual

        return DB::table('incomes')
            ->whereRaw('EXTRACT(MONTH FROM created_at) = ?', [$mesActual])
            ->whereRaw('EXTRACT(YEAR FROM created_at) = ?', [$anioActual])
            ->where('status', 0)
            ->where('account_id', auth()->user()->selected_account)
            ->sum('amount');
    }

    public function montoEgresoActual()
    {
        $mesActual = date('n'); // Mes actual
        $anioActual = date('Y'); // Año actual

        return DB::table('expenses')
            ->whereRaw('EXTRACT(MONTH FROM created_at) = ?', [$mesActual])
            ->whereRaw('EXTRACT(YEAR FROM created_at) = ?', [$anioActual])
            ->where('status', 0)
            ->where('account_id', auth()->user()->selected_account)
            ->sum('amount');
    }

    public function montoPrestamoActual()
    {
        $mesActual = date('n'); // Mes actual
        $anioActual = date('Y'); // Año actual

        return DB::table('loans')
            ->whereRaw('EXTRACT(MONTH FROM created_at) = ?', [$mesActual])
            ->whereRaw('EXTRACT(YEAR FROM created_at) = ?', [$anioActual])
            ->where('status', 0)
            ->where('account_id', auth()->user()->selected_account)
            ->sum("Balance");
    }
    public static function montoTotalAccountInt()
    {
        $cuentaId = auth()->user()->selected_account;
        return DB::table('accounts')
            ->where('id', $cuentaId)
            ->sum('amount');
    }
    // public function consultarIngresos()
    // {
    //     $fechaInicio = Carbon::now()->subMonths(3)->startOfMonth();
    //     $fechaFin = Carbon::now()->endOfMonth();
    //     $account_id = auth()->user()->selected_account;

    //     $ingresos = DB::table('incomes')
    //         ->where('status', 0)
    //         ->where('account_id', $account_id)
    //         ->whereBetween('created_at', [$fechaInicio, $fechaFin])
    //         ->select(DB::raw('MONTH(created_at) as mes, SUM(amount) as total'))
    //         ->groupBy('mes')
    //         ->orderBy('mes')
    //         ->pluck('total', 'mes'); // Pluck devuelve un array clave (mes) => valor (total)
    //     return $this->llenarMesesFaltantes($ingresos);
    // }

    // public function consultarEgresos()
    // {
    //     $fechaInicio = Carbon::now()->subMonths(3)->startOfMonth();
    //     $fechaFin = Carbon::now()->endOfMonth();
    //     $account_id = auth()->user()->selected_account;

    //     $egresos = DB::table('expenses')
    //         ->where('status', 0)
    //         ->where('account_id', $account_id)
    //         ->whereBetween('created_at', [$fechaInicio, $fechaFin])
    //         ->select(DB::raw('MONTH(created_at) as mes, SUM(amount) as total'))
    //         ->groupBy('mes')
    //         ->orderBy('mes')
    //         ->pluck('total', 'mes'); 

    //     return $this->llenarMesesFaltantes($egresos);
    // }
    // public function consultarPrestamo()
    // {
    //     $fechaInicio = Carbon::now()->subMonths(3)->startOfMonth();
    //     $fechaFin = Carbon::now()->endOfMonth();
    //     $account_id = auth()->user()->selected_account;

    //     $prestamos = DB::table('loans')
    //         ->where('status', 0)
    //         ->where('account_id', $account_id)
    //         ->whereBetween('created_at', [$fechaInicio, $fechaFin])
    //         ->select(DB::raw('MONTH(created_at) as mes, SUM(Balance) as total'))
    //         ->groupBy('mes')
    //         ->orderBy('mes')
    //         ->pluck('total', 'mes'); 

    //     return $this->llenarMesesFaltantes($prestamos);
    // }
    public function consultarIngresos()
    {
        $fechaInicio = Carbon::now()->subMonths(3)->startOfMonth();
        $fechaFin = Carbon::now()->endOfMonth();
        $account_id = auth()->user()->selected_account;

        $ingresos = DB::table('incomes')
            ->where('status', 0)
            ->where('account_id', $account_id)
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->select(DB::raw('EXTRACT(MONTH FROM created_at) as mes, SUM(amount) as total'))
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes');

        return $this->llenarMesesFaltantes($ingresos);
    }

    public function consultarEgresos()
    {
        $fechaInicio = Carbon::now()->subMonths(3)->startOfMonth();
        $fechaFin = Carbon::now()->endOfMonth();
        $account_id = auth()->user()->selected_account;

        $egresos = DB::table('expenses')
            ->where('status', 0)
            ->where('account_id', $account_id)
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->select(DB::raw('EXTRACT(MONTH FROM created_at) as mes, SUM(amount) as total'))
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes');

        return $this->llenarMesesFaltantes($egresos);
    }

    public function consultarPrestamo()
    {
        $fechaInicio = Carbon::now()->subMonths(3)->startOfMonth();
        $fechaFin = Carbon::now()->endOfMonth();
        $account_id = auth()->user()->selected_account;

        $prestamos = DB::table('loans')
            ->where('status', 0)
            ->where('account_id', $account_id)
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->select(DB::raw('EXTRACT(MONTH FROM created_at) as mes, SUM("Balance") as total'))
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes');

        return $this->llenarMesesFaltantes($prestamos);
    }

    // 🔹 Función auxiliar para completar meses faltantes con 0
    private function llenarMesesFaltantes($datos)
    {
        $bandera = false;
        $meses = collect();
        for ($i = 3; $i >= 0; $i--) {
            $mes = Carbon::now()->subMonths($i)->month;
            // dd(Carbon::now()->subMonths(1)->month);
            if ($mes == 3 && $bandera == false) {
                $bandera = true;
                $mes = $mes == 3 ? 2 : $mes;
            }
            $meses->push([
                'mes' => $mes,
                'total' => $datos[$mes] ?? 0
            ]);
        }
        return $meses;
    }
}