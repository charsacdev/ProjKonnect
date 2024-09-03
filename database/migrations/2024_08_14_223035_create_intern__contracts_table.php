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
        Schema::create('intern__contracts', function (Blueprint $table) {
            $table->id();
            $table->string('employer_id');
            $table->string('student_id');
            $table->longText('contract');
            $table->string('signature_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intern__contracts');
    }
};
