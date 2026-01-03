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
        Schema::create('truck_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('truck_id')->constrained();
            $table->date('service_date');
            $table->string('shop_name');
            $table->string('shop_invoice');
            $table->string('service_type')->nullable();      
            $table->integer('mileage')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('truck_services');
    }
};
