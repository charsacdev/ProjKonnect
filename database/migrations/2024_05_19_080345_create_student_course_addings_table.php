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
        Schema::create('student_course_addings', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('proguide_id');
            $table->string('course_id');
            $table->string('payment_reference');
            $table->string('payment_status');
            $table->string('payment_amount');
            $table->string('course_chapters');
            $table->string('current_chapters');
            $table->string('points_earned');
            $table->string('badged_earned');
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_course_addings');
    }
};
