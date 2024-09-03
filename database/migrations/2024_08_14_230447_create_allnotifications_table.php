<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('allnotifications', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->longText('notification');
            $table->string('is_read');
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('allnotifications');
    }
};
