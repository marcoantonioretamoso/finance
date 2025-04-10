<?php

namespace App\Providers;

use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('es');
        view()->composer('admin.layouts.app', function($view)
        {
            if(Auth::check()){
                $accounts = Account::getCuentaDelUsuarioLogeado();
            }else{
                $accounts = [];
            }
            $view->with(['accounts'=> $accounts]);
        });
    }
}