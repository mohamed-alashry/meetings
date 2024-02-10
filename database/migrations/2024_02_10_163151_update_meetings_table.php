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
        Schema::table('meetings', function (Blueprint $table) {
            // remove column
            $table->dropColumn('duration');
            $table->dropColumn('person_capacity');
            $table->boolean('send_room_attach')->default(0);
            $table->boolean('send_room_properties')->default(0);
            $table->unsignedInteger('reminder_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
