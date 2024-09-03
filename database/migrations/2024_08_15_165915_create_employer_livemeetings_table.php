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
        Schema::create('employer_livemeetings', function (Blueprint $table) {
            $table->id();
            $table->string('employer_id');
            $table->string('user_id');
            $table->string('meeting_name');
            $table->string('meeting_id');
            $table->string('app_id');
            $table->string('app_certificate');
            $table->string('token');
            $table->string('meeting_status');
            $table->string('meeting_duration');
            $table->string('meeting_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_livemeetings');
    }
};
