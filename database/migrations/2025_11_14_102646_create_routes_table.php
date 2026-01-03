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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('destination');
            $table->date('date_issued');
            $table->foreignId('driver_id')->constrained();
            $table->integer('travel_order');
            $table->decimal('tour_payment', 10, 2)->nullable();
            $table->decimal('bank_amount', 10, 2)->nullable();
            $table->decimal('visa', 10, 2)->nullable();
            $table->decimal('cash', 10, 2)->nullable();
            $table->boolean('paid')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
