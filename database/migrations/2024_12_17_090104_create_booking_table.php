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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('property'); 
            $table->string('penyewa')->nullable(false); 
            $table->string('nomor_penyewa')->nullable(false); 
            $table->string('NIK')->nullable(false); 
            $table->string('lampiran_ktp')->nullable(false); 
            $table->decimal('harga_tersewa', 10, 2)->nullable(false); 
            $table->enum('pajak', ['y', 'n'])->nullable(false);
            $table->decimal('DP_1', 10, 2)->nullable();
            $table->date('tanggal_dp_1')->nullable();
            $table->decimal('DP_2', 10, 2)->nullable();
            $table->date('tanggal_dp_2')->nullable();
            $table->date('pelunasan')->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->string('surat_kontrak')->nullable(false); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
