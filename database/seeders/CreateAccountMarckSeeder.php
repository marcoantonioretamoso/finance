<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\UsuarioAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateAccountMarckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Account::where('name', 'Ahorro Marck')->exists()){
            Account::create([
                'id' => 2,
                'name' => 'Ahorro Marck',
                'description' => 'Cuenta de marck',
                'amount' => 2100,
            ]);
            UsuarioAccount::create([
                'id' => 3,
                'user_id' => 1,
                'account_id' => 2
            ]);
        }
    }
}