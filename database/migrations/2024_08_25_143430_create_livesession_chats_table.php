<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('livesession_chats', function (Blueprint $table) {
            $table->id();
            $table->string('session_id');
            $table->string('user_id');
            $table->longText('message');
            $table->string('files');
            $table->string('file_type');
            $table->string('file_size');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livesession_chats');
    }
};
