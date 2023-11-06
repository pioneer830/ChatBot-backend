<?php

use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index()->unique();
            $table->morphs('payable');
            $table->double('amount');
            $table->foreignIdFor(Plan::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->timestamp('settled_at')->nullable();
            $table->string('type')->default('debit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
