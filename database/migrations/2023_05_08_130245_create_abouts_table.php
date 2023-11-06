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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('industry_id');
            $table->unsignedBigInteger('user_id');
            $table->string('job_title');
            $table->text('job_description');
            $table->timestamps();
            $table->index('id');
            $table->index('industry_id');
            $table->index('user_id');
            $table->index('job_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
