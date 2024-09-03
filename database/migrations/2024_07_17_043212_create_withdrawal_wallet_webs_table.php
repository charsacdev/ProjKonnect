<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('withdrawal_wallet_webs', function (Blueprint $table) {
            $table->id();
            $table->string('proguide_id');
            $table->string('wallet_balance');
            $table->string('pending_balance');
            $table->string('status');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('withdrawal_wallet_webs');
    }
};
