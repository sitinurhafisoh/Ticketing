<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('payments', function (Blueprint $table) {
        $table->unsignedBigInteger('ticket_reservation_id');

        // Jika ada relasi foreign key:
        $table->foreign('ticket_reservation_id')->references('id')->on('ticket_reservations')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('payments', function (Blueprint $table) {
        $table->dropForeign(['ticket_reservation_id']);
        $table->dropColumn('ticket_reservation_id');
    });
}

};
