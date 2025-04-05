<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\UsuarioAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateAccountMeluSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         if(!Account::where('name', 'Ahorro Melu')->exists()){
            Account::create([
                'id' => 3,
                'name' => 'Ahorro Melu',
                'description' => 'Cuenta de melu',
                'amount' => 0,
            ]);
            UsuarioAccount::create([
                'id' => 4,
                'user_id' => 1,
                'account_id' => 3
            ]);
        }
    }
}