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
        Schema::create('ticket_reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('route_id'); // id dari Travelasing
            $table->string('transport_name');
            $table->string('from');
            $table->string('to');
            $table->dateTime('departure');
            $table->decimal('price', 12, 2);
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_reservations');
    }
};
