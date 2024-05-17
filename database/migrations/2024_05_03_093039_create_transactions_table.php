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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('ref', 100);
            $table->string('status', 15);
            $table->double('amount');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('transaction_method_id');
            $table->longText('meta')->nullable();
            $table->timestamps();
            $table->timestamp('expired_at')->nullable();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('transaction_method_id')->references('id')->on('transaction_methods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
