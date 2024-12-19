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
        Schema::create('booking_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('property');
            $table->string('penyewa')->nullable(false);
            $table->string('nomor_penyewa')->nullable(false);
            $table->string('NIK')->nullable(false);
            $table->decimal('harga_tersewa', 10, 2)->nullable(false);
            $table->enum('status', ['perpanjang', 'ganti_orang', 'tidak_diperpanjang']);
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_history');
    }
};
