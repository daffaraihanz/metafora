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
            $table->string('sub_bab_name', 100);
            $table->string('total_score', 100)->nullable();
            $table->integer('id_users')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_test_scores', function (Blueprint $table) {
            $table->dropColumn('sub_bab_name');
            $table->dropColumn('total_score');
            $table->dropColumn('id_users');
        });
    }
};
