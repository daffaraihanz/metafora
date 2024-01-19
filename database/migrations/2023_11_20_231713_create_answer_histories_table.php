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
        Schema::create('answer_histories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('aspect_colors', 100);
            $table->integer('aspect_total_scores');
            $table->string('name', 100);
            $table->integer('scores');
            $table->string('question_names', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_histories');
    }
};
