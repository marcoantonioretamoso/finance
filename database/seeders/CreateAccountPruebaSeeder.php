<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\UsuarioAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateAccountPruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Account::where('name', 'Ahorro prueba marck')->exists()){
            Account::create([
                'id' => 9,
                'name' => 'Ahorro prueba marck',
                'description' => 'Cuenta de prueba marck',
                'amount' => 0,
            ]);
            UsuarioAccount::create([
                'id' => 9,
                'user_id' => 1,
                'account_id' => 9
            ]);
        }
    }
}