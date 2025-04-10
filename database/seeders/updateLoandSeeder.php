<?php

namespace Database\Seeders;

use App\Models\Loan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class updateLoandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $loans = Loan::get();

        foreach ($loans as $loan) {
            $monto = $loan->amount;
            $loan->update([
                'Balance' => $monto,
            ]);
        }
    }
}