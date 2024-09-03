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
        Schema::create('projkonnect_ai_models', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('chat_url');
            $table->string('chat_user');
            $table->longText('message');
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projkonnect_ai_models');
    }
};
