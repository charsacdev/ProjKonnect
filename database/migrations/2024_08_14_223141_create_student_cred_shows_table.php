<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('student_cred_shows', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->json('credshow_step1');
            $table->json('credshow_step2');
            $table->json('credshow_step3');
            $table->json('credshow_step4');
            $table->string('credshow_link');
            $table->string('credshow_status');
            $table->string('credshow_lasturl');
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('student_cred_shows');
    }
};
