<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->double('amount')->default(0);
            $table->string('description');
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->tinyInteger('status',0)->default(0)->comment('0 activo,1 eliminado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};