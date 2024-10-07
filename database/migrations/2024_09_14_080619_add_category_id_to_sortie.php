<?php

use App\Models\Beneficiaire;
use App\Models\Caisse;
use App\Models\Category;
use App\Models\Fournisseur;
use App\Models\IdeHelperCategory;
use App\Models\Personnel;
use App\Models\User;
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
        Schema::table('sorties', function (Blueprint $table) {
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Beneficiaire::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Personnel::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Fournisseur::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sorties', function (Blueprint $table) {
            $table->dropForeignIdFor(Category::class);
            $table->dropForeignIdFor(Beneficiaire::class);
            $table->dropForeignIdFor(Personnel::class);
            $table->dropForeignIdFor(Caisse::class);
            $table->dropForeignIdFor(Fournisseur::class);
            $table->dropForeignIdFor(User::class);
        });
    }
};
