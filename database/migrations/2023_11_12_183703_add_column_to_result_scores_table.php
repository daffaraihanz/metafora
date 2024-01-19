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
        Schema::table('result_scores', function (Blueprint $table) {
            $table->unsignedBigInteger('id_results');
            $table->foreign('id_results')->references('id')->on('results');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('result_scores', function (Blueprint $table) {
            $table->dropForeign(['id_results']);
            $table->dropColumn('id_results');
        });
    }
};
