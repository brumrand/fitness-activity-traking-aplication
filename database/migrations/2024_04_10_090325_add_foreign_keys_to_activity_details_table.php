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
        Schema::table('activity_details', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activity_details', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('activity_type_id')->references('id')->on('activity_types');
            $table->foreign('distance_unit_id')->references('id')->on('distance_units');
            $table->foreign('elapsed_time_unit_id')->references('id')->on('elapsed_time_units');
        });
    }
};
