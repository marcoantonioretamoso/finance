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
        if(!Account::where('name', 'Ahorro Prueba')->exists()){
            Account::create([
                'id' => 7,
                'name' => 'Ahorro Prueba',
                'description' => 'Cuenta de prueba',
                'amount' => 100,
            ]);
            UsuarioAccount::create([
                'id' => 7,
                'user_id' => 1,
                'account_id' => 7
            ]);
        }
    }
}