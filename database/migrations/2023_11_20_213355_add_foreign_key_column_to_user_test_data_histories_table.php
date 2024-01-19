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
        Schema::table('user_test_data_histories', function (Blueprint $table) {
            $table->foreign('id_registration')->references('id')->on('detail_payments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_test_data_histories', function (Blueprint $table) {
            $table->dropForeign(['id_registration']);
        });
    }
};
