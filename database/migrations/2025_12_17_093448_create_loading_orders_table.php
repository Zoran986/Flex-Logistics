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
        Schema::create('loading_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('loading_order_number');
            $table->string('driver');
            $table->string('truck_number');
            $table->string('destination')->nullable();
            $table->date('date_of_loading');
            $table->string('place_of_loading');
            $table->foreignId('company_id');
            $table->string('export_customs');
            $table->string('import_customs')->nullable();
            $table->date('date_of_unloading')->nullable();
            $table->string('place_of_unloading');
            $table->string('important')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loading_orders');
    }
};
