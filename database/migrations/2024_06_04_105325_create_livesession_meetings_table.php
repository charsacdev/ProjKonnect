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
        Schema::create('livesession_meetings', function (Blueprint $table) {
            $table->id();
            $table->string('meeting_banner');
            $table->string('proguide_id');
            $table->string('meeting_title');
            $table->text('meeting_description');
            $table->string('meeting_price');
            $table->string('meeting_name');
            $table->string('meeting_id');
            $table->string('app_id');
            $table->string('app_certificate');
            $table->string('token');
            $table->string('meeting_participant');
            $table->json('meeting_interest');
            $table->string('meeting_status');
            $table->string('meeting_duration');
            $table->string('meeting_date');
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livesession_meetings');
    }
};
