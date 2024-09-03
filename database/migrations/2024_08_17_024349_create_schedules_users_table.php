<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('schedules_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->json('schedules');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('schedules_users');
    }
};
