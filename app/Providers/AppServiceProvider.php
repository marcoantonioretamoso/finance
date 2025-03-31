<?php

namespace App\Providers;

use App\Models\Account;
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