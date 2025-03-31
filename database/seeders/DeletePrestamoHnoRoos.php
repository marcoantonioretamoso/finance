<?php

namespace Database\Seeders;

use App\Models\Expense;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeletePrestamoHnoRoos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $expense = Expense::where('name', 'Prestamo Hno Ross')->first();
        $expense->delete();
    }
}