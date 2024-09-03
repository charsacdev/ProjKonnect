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
        Schema::create('employment_tasks', function (Blueprint $table) {
            $table->string('user_id');
            $table->string('job_id');
            $table->string('title');
            $table->longText('description');
            $table->string('duration');
            $table->string('resource');
            $table->string('document');
            $table->string('deadline');
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employment_tasks');
    }
};
