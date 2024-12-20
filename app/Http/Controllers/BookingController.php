<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Property;
use App\Models\Booking;
use App\Models\BookingHistory;

class BookingController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        $books = Booking::all();
        return view('booking', compact('properties'));
    }

    public function extendContract($id)
    {
        $property = Property::findOrFail($id);
        $currentBooking = $property->bookings()->where('status', 'rented')->first();

        if (!$currentBooking) {
            return redirect()->route('books.booking')->with('error', 'Properti ini belum disewa.');
        }

        return view('books.extend', compact('property', 'currentBooking'));
    }

    public function storeExtension(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $currentBooking = $property->bookings()->where('status', 'rented')->first();

        if (!$currentBooking) {
            return redirect()->route('books.booking')->with('error', 'Properti ini belum disewa.');
        }

        $tanggal_mulai = Carbon::now();
        $tanggal_berakhir = $this->calculateEndDate($tanggal_mulai, $property->periode_sewa);

        $bookingHistory = new BookingHistory([
            'booking_id' => $currentBooking->id,
            'property_id' => $property->id,
            'penyewa' => $currentBooking->penyewa,
            'status' => 'perpanjang',
            'tanggal_mulai' => $currentBooking->tanggal_mulai,
            'tanggal_berakhir' => $currentBooking->tanggal_berakhir
        ]);
        $bookingHistory->save();

        $currentBooking->update([
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_berakhir' => $tanggal_berakhir,
            'harga_tersewa' => $request->harga_tersewa,
            'pajak' => $request->pajak,
        ]);

        return redirect()->route('books.booking')->with('success', 'Kontrak berhasil diperpanjang.');
    }


    public function changeTenant($id)
    {
        $property = Property::findOrFail($id);
        $currentBooking = $property->bookings()->where('status', 'rented')->first();

        if (!$currentBooking) {
            return redirect()->route('books.booking')->with('error', 'Properti ini belum disewa.');
        }

        return view('books.change', compact('property', 'currentBooking'));
    }

    public function storeChangeTenant(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $currentBooking = $property->bookings()->where('status', 'rented')->first();

        if (!$currentBooking) {
            return redirect()->route('books.booking')->with('error', 'Properti ini belum disewa.');
        }

        $tanggal_mulai = Carbon::now();
        $tanggal_berakhir = $this->calculateEndDate($tanggal_mulai, $property->periode_sewa);

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
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_berakhir' => $tanggal_berakhir,
            'surat_kontrak' => $request->surat_kontrak,
        ]);
        $newBooking->save();

        return redirect()->route('books.booking')->with('success', 'Penyewa berhasil diganti.');
    }

    public function calculateEnddate($startDate, $periode)
    {
        switch(strtolower($periode)) {
            case '1 tahun':
                return $startDate->addYear();

            case '6 bulan':
                return $startDate->addMonths(6);

            case '3 bulan':
                return $startDate->addMonths(3);
            
            case 'bulanan':
                return $startDate->addMonth();

            default:
            throw new \Exception('Periode sewa tidak valid.');
        }
    }

    public function showBookingForm()
    {
        $properties = Property::all(); 
        return view('booking', compact('properties'));
    }
}
