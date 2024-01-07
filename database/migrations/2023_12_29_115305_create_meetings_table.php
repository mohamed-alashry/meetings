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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('brief')->nullable();
            $table->string('description')->nullable();
            $table->datetime('start_date')->nullable();
            $table->unsignedInteger('duration')->nullable()->comment('In minutes');
            $table->datetime('end_date')->nullable();
            $table->datetime('alert_date')->nullable();
            $table->unsignedInteger('status')->default(1)->comment('1 => Draft, 2 => Scheduled, 3 => Active, 4 => Cancelled, 5 => Finished');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('meeting_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meeting_id')->constrained('meetings')->onDelete('cascade');
            $table->string('file_type')->default(1)->comment('1 => Image, 2 => Video, 3 => Audio, 4 => Document');
            $table->string('file_name');
            $table->timestamps();
        });


        Schema::create('meeting_invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meeting_id')->constrained('meetings')->onDelete('cascade');
            $table->morphs('userable');
            $table->unsignedTinyInteger('type')->default(2)->comment('1 => Admin, 2 => Invitee, 3 => Guest');
            $table->unsignedInteger('status')->default(1)->comment('1 => Pending, 2 => Accepted, 3 => Rejected');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting_invitations');
        Schema::dropIfExists('meeting_media');
        Schema::dropIfExists('meetings');
    }
};
