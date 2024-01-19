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
        Schema::table('user_test_scores', function (Blueprint $table) {
            $table->unsignedBigInteger('id_sub_bab')->nullable()->change();
            $table->foreign('id_sub_bab')->references('id')->on('subbabs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_test_scores', function (Blueprint $table) {
            //
        });
    }
};
