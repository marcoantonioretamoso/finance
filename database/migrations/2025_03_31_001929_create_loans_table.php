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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->double('amount')->default(0);
            $table->double('interest')->default(0);
            $table->double('Balance')->default(0);
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
        Schema::dropIfExists('loans');
    }
};