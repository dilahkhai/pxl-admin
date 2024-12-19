<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Property;
use App\Models\Booking;
use App\Models\BookingHistory;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    public function extendContract($id)
    {
        $property = Property::findOrFail($id);
        $currentBooking = $property->bookings()->where('status', 'rented')->first();

        if (!$currentBooking) {
            return redirect()->route('properties.index')->with('error', 'Properti ini belum disewa.');
        }

        return view('properties.extend', compact('property', 'currentBooking'));
    }

    public function storeExtension(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $currentBooking = $property->bookings()->where('status', 'rented')->first();

        if (!$currentBooking) {
            return redirect()->route('properties.index')->with('error', 'Properti ini belum disewa.');
        }

        // Pindahkan data kontrak lama ke booking_history
        $bookingHistory = new BookingHistory([
            'booking_id' => $currentBooking->id,
            'property_id' => $property->id,
            'penyewa' => $currentBooking->penyewa,
            'status' => 'perpanjang',
            'tanggal_mulai' => $currentBooking->tanggal_mulai,
            'tanggal_berakhir' => $currentBooking->tanggal_berakhir
        ]);
        $bookingHistory->save();

        // Update status kontrak lama menjadi perpanjang dan tambah kontrak baru
        $currentBooking->update([
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'harga_tersewa' => $request->harga_tersewa,
            'pajak' => $request->pajak,
        ]);

        // Update status properti
        $property->update(['status' => 'rented']);

        return redirect()->route('properties.index')->with('success', 'Kontrak berhasil diperpanjang.');
    }

    // Fungsi untuk mengganti penyewa
    public function changeTenant($id)
    {
        $property = Property::findOrFail($id);
        $currentBooking = $property->bookings()->where('status', 'rented')->first();

        if (!$currentBooking) {
            return redirect()->route('properties.index')->with('error', 'Properti ini belum disewa.');
        }

        return view('properties.change', compact('property', 'currentBooking'));
    }

    // Fungsi untuk menyimpan ganti penyewa
    public function storeChangeTenant(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $currentBooking = $property->bookings()->where('status', 'rented')->first();

        if (!$currentBooking) {
            return redirect()->route('properties.index')->with('error', 'Properti ini belum disewa.');
        }

        // Pindahkan data kontrak lama ke booking_history
        $bookingHistory = new BookingHistory([
            'booking_id' => $currentBooking->id,
            'property_id' => $property->id,
            'penyewa' => $currentBooking->penyewa,
            'status' => 'ganti_orang',
            'tanggal_mulai' => $currentBooking->tanggal_mulai,
            'tanggal_berakhir' => $currentBooking->tanggal_berakhir
        ]);
        $bookingHistory->save();

        $newBooking = new Booking([
            'property_id' => $property->id,
            'penyewa' => $request->penyewa,
            'nomor_penyewa' => $request->nomor_penyewa,
            'NIK' => $request->NIK,
            'lampiran_ktp' => $request->lampiran_ktp,
            'harga_tersewa' => $request->harga_tersewa,
            'pajak' => $request->pajak,
            'DP_1' => $request->DP_1,
            'tanggal_dp_1' => $request->tanggal_dp_1,
            'DP_2' => $request->DP_2,
            'tanggal_dp_2' => $request->tanggal_dp_2,
            'pelunasam' => $request->pelunasam,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'surat_kontrak' => $request->surat_kontrak,
        ]);
        $newBooking->save();

        // Update status properti menjadi rented
        $property->update(['status' => 'rented']);

        return redirect()->route('properties.index')->with('success', 'Penyewa berhasil diganti.');
    }
}
