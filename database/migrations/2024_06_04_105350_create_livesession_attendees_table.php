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
        Schema::create('livesession_attendees', function (Blueprint $table) {
            $table->id();
            $table->string('meeting_id');
            $table->string('meeting_attendee');
            $table->string('meeting_status');
            $table->string('pay_status');
            $table->string('pay_ref');
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livesession_attendees');
    }
};
