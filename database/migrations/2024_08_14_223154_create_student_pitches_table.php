<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('student_pitches', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->json('pitch_details');
            $table->string('pitch_status');
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('student_pitches');
    }
};
