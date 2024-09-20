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
        Schema::create('entrers', function (Blueprint $table) {
            $table->engine= 'InnoDB';
            $table->integer('Montant');
            $table->enum('type', ['Hebdomadaire', 'Imprévu']);
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrers');
    }
};
