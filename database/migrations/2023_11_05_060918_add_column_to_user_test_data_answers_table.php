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
        Schema::table('user_test_data_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('id_answers_from_user_test_datas')->required();
            $table->unsignedBigInteger('id_answers_from_answers')->required();
            $table->foreign('id_answers_from_user_test_datas')->references('id')->on('user_test_datas');
            $table->foreign('id_answers_from_answers')->references('id')->on('answers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_test_data_answers', function (Blueprint $table) {
            $table->dropForeign(['id_answers_from_user_test_datas']);
            $table->dropForeign(['id_answers_from_answers']);
            $table->dropColumn('id_answers_from_user_test_datas');
            $table->dropColumn('id_answers_from_answers');
        });
    }
};
