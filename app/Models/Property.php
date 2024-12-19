<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'property';

    protected $fillable = [
        'pemilik', 'agent', 'developer', 'type', 'description', 'address',
        'tahun_perolehan', 'jumlah_tingkat', 'LT', 'LB', 'sertifikat', 'penggunaan',
        'periode_sewa', 'status_pbb', 'harga_penawaran', 'deposit_sewa', 'harga_jual',
        'listrik', 'air', 'ipl', 'rate_komisi', 'status', 'photo_path'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
