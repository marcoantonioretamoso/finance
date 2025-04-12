<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\UsuarioAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateAccountPapaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Account::where('name', 'Cuenta papá')->exists()){
            Account::create([
                'id' => 12,
                'name' => 'Cuenta papá',
                'description' => 'Cuenta de papa',
                'amount' => 0,
            ]);
            UsuarioAccount::create([
                'id' => 15,
                'user_id' => 1,
                'account_id' => 12
            ]);
        }
    }
}