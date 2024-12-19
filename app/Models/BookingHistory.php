<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingHistory extends Model
{
    use HasFactory;

    protected $table = 'booking_history';

    protected $fillable = [
        'property_id', 'penyewa', 'nomor_penyewa', 'NIK', 'lampiran_ktp', 'harga_tersewa',
        'status', 'tanggal_mulai', 'tanggal_berakhir'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
