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
        Schema::create('userweb_plans', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('plan_name');
            $table->string('plan_id');
            $table->string('plan_price');
            $table->string('plan_status');
            $table->string('plan_duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userweb_plans');
    }
};
