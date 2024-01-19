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
        Schema::table('answer_histories', function (Blueprint $table) {
            $table->foreign('id_aspect_histories')->references('id')->on('aspect_histories');
            $table->foreign('id_question_histories')->references('id')->on('question_histories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('answer_histories', function (Blueprint $table) {
            $table->dropForeign('id_aspect_histories');
            $table->dropForeign('id_question_histories');
        });
    }
};
