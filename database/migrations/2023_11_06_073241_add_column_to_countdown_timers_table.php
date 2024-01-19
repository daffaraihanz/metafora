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
        Schema::table('countdown_timers', function (Blueprint $table) {
            $table->dateTime('launch_date');
            $table->boolean('status');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('countdown_timers', function (Blueprint $table) {
            $table->dropColumn('launch_date');
            $table->dropColumn('status');
        });
    }
};
