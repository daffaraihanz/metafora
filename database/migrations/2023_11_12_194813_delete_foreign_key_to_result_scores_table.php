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
            $table->dropForeign(['id_sub_babs']);
            $table->dropColumn('id_sub_babs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('result_scores', function (Blueprint $table) {
            //
        });
    }
};
