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
        Schema::create('intern_tables', function (Blueprint $table) {
            $table->id();
            $table->string('employer_id');
            $table->text('role');
            $table->longText('description');
            $table->string('payment');
            $table->string('duration');
            $table->string('number_applicant');
            $table->json('skills');
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intern_tables');
    }
};
