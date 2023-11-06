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
        Schema::table('users', function (Blueprint $table) {
            $table->string("client_ip", 200)->after('remember_token')->nullable();
            $table->string('first_name', 255)->nullable()->change();
            $table->string('last_name', 255)->nullable()->change();
            $table->string('email', 255)->nullable()->change();
            $table->string('password', 255)->nullable()->change();
            $table->string('job_title', 255)->nullable()->change();
            $table->longText('job_description')->nullable()->change();
            $table->string('industry', 255)->nullable()->change();
            $table->longText('industry_description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
