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
        Schema::table('question_packages', function (Blueprint $table) {
            $table->dateTime('end-timer')->nullable();
            $table->boolean('flag');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('question_packages', function (Blueprint $table) {
            $table->dropColumn('end-timer');
            $table->dropColumn('flag');
        });
    }
};
