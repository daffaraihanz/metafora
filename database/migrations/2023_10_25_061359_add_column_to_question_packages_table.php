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
            $table->string('name', 100)->required()->after('id');
            $table->string('price', 100)->required();
            $table->string('timer', 100)->required();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('question_packages', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('price');
            $table->dropColumn('timer');
        });
    }
};
