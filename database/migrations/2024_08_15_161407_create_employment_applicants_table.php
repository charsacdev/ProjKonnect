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
        Schema::create('employment_applicants', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('credshow');
            $table->string('resume');
            $table->string('cover_letter');
            $table->string('status');
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employment_applicants');
    }
};
