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
        Schema::create('user_auth_tokens', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->string('token',100);
            $table->dateTime('token_expiry')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_auth_tokens');
    }
};
