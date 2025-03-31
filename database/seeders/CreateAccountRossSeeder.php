<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\UsuarioAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateAccountRossSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        if(!Account::where('name', 'Ahorro Ross')->exists()){
            Account::create([
                'id' => 1,
                'name' => 'Ahorro Ross',
                'description' => 'Cuenta de Ross',
                'amount' => 5000,
            ]);
            UsuarioAccount::create([
                'id' => 1,
                'user_id' => 1,
                'account_id' => 1
            ]);
            UsuarioAccount::create([
                'id' => 2,
                'user_id' => 2,
                'account_id' => 1
            ]);
        }
    }
}