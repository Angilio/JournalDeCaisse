<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personnels', function (Blueprint $table) {
            $table->string('image')->after('email')->nullable();
        });
        Schema::table('fournisseurs', function (Blueprint $table) {
            $table->string('image')->after('Contact')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personnels', function (Blueprint $table) {
            $table->dropColumn('image');
        });
        Schema::table('fournisseurs', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
