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
        Schema::create('property', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('pemilik')->nullable(false); 
            $table->string('agent')->nullable(false); 
            $table->string('developer')->nullable(false); 
            $table->string('type')->nullable(false); 
            $table->string('description')->nullable(false); 
            $table->string('address', 255)->nullable(false);
            $table->string('tahun_perolehan', 255); 
            $table->string('jumlah_tingkat', 255); 
            $table->string('LT', 255); 
            $table->string('LB', 255); 
            $table->string('sertifikat', 255)->nullable(false); 
            
            $table->enum('penggunaan', ['Dijual', 'Disewakan', 'Dikosongkan', 'Renovasi'])
                  ->default('Disewakan'); 
            
            $table->enum('periode_sewa', ['1 tahun', '6 bulan', '3 bulan', 'bulanan'])
                  ->nullable(); 
            
            $table->enum('status_pbb', ['sudah bayar', 'belum bayar'])->nullable(false);
            $table->decimal('harga_penawaran', 10, 2)->nullable(false); 
            $table->decimal('deposit_sewa', 10, 2)->nullable(false); 
            $table->decimal('harga_jual', 10, 2)->nullable(false); 
            
            $table->string('listrik', 255); 
            $table->enum('air', ['PDAM', 'artesis'])->nullable(); 
            $table->decimal('ipl', 10, 2); 
            $table->decimal('rate_komisi', 10, 2)->default(0.00)->nullable(false); 
            
            $table->enum('status', ['available', 'rented', 'sold'])->default('available')->nullable(false);
            $table->string('photo_path');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property');
    }
};
