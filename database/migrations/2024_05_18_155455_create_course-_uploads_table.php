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
        Schema::create('course-_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('course_banner');
            $table->string('course_title');
            $table->text('course_description');
            $table->string('course_proguide_id');
            $table->string('course_price');
            $table->string('course_students');
            $table->string('course_revenue');
            $table->json('course_interest');
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course-_uploads');
    }
};
