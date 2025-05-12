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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama Pemesan
            $table->string('metode_pembayaran'); // Metode Pembayaran (transfer, ewallet, kartu kredit)
            $table->string('nomor_pembayaran'); // Nomor Rekening atau Nomor Pembayaran
            $table->decimal('total', 15, 2); // Total Pembayaran
            $table->timestamps(); // Untuk menyimpan waktu dibuat dan diupdate
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
