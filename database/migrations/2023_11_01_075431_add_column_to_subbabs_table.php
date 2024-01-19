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
        Schema::table('subbabs', function (Blueprint $table) {
            $table->unsignedBigInteger('id_babs')->required();
            $table->foreign('id_babs')->references('id')->on('babs');
            $table->string('name', 100);
            $table->string('color', 100);
            $table->integer('total_score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subbabs', function (Blueprint $table) {
            $table->dropForeign(['id_babs']);
            $table->dropColumn('id_babs');
            $table->dropColumn('name');
            $table->dropColumn('total_score');
            $table->dropColumn('color');
        });
    }
};
