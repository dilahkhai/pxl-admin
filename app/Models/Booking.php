<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';

    protected $fillable = [
        'property_id', 'penyewa', 'nomor_penyewa', 'NIK', 'lampiran_ktp', 'harga_tersewa',
        'pajak', 'DP_1', 'tanggal_dp_1', 'DP_2', 'tanggal_dp_2', 'pelunasan',
        'tanggal_mulai', 'tanggal_berakhir', 'surat_kontrak'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function bookingHistory()
    {
        return $this->belongsTo(BookingHistory::class);
    }
}
