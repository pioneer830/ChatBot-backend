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
        Schema::table('plans', function (Blueprint $table) {
            $table->string('trial_period_days')->after('amount')->nullable();
            $table->string('plan_logo')->after('amount')->nullable();
            $table->string('plan_intervalCount')->after('amount')->nullable();
            $table->string('plan_interval')->after('amount')->nullable();
            $table->longText('plan_description')->after('amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plans', function (Blueprint $table) {
            //
        });
    }
};
