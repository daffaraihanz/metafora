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
            $table->dropForeign(['id_babs']);
            $table->dropColumn('id_babs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subbabs', function (Blueprint $table) {
            //
        });
    }
};
