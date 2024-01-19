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
        Schema::table('detail_payments', function (Blueprint $table) {
            $table->unsignedBigInteger('id_users')->required();
            $table->unsignedBigInteger('id_question_packages')->required();
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_question_packages')->references('id')->on('question_packages');
            $table->integer('whatsapp')->required();
            $table->string('flag_journey', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_payments', function (Blueprint $table) {
            $table->dropForeign(['id_users']);
            $table->dropColumn('id_users');
            $table->dropForeign(['id_question_packages']);
            $table->dropColumn('id_question_packages');
            $table->dropColumn('whatsapp');
            $table->dropColumn('flag_journey');
        });
    }
};
