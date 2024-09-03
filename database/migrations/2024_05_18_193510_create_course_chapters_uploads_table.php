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
        Schema::create('course_chapters_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('course_Id');
            $table->string('course_chapter');
            $table->text('description');
            $table->string('course_video');
            $table->string('course_assignment');
            $table->string('course_resources');
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_chapters_uploads');
    }
};
