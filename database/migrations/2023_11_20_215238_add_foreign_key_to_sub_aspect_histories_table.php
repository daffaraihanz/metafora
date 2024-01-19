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
        Schema::table('sub_aspect_histories', function (Blueprint $table) {
            $table->foreign('id_aspect_histories')->references('id')->on('aspect_histories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_aspect_histories', function (Blueprint $table) {
            $table->dropForeign('id_aspect_histories');
        });
    }
};
