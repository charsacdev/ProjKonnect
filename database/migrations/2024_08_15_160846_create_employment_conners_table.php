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
        Schema::create('employment_conners', function (Blueprint $table) {
            $table->string('employer_id');
            $table->text('role');
            $table->longText('responsibity');
            $table->string('salary');
            $table->string('number_applicant');
            $table->json('skills');
            $table->json('interview_question');
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employment_conners');
    }
};
