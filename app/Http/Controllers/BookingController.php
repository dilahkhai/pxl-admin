<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Property;
use App\Models\Booking;
use App\Models\BookingHistory;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        $books = Booking::all();
        return view('books.booking', compact('properties'));
    }

    public function createBooking($id)
    {
        $properties = Property::find($id); 
        return view('books.booking_prop', compact('properties'));
    }

    public function storeBooking(Request $request)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:property,id',
            'penyewa' => 'required|string|max:255',
            'nomor_penyewa' => 'required|string|max:20',
            'NIK' => 'required|string|max:16',
            'lampiran_ktp' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'harga_tersewa' => 'required|numeric',
            'pajak' => 'required|in:y,n',
            'DP_1' => 'nullable|numeric',
            'tanggal_dp_1' => 'nullable|date',
            'DP_2' => 'nullable|numeric',
            'tanggal_dp_2' => 'nullable|date',
            'pelunasan' => 'required|numeric',
            'periode_sewa' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'surat_kontrak' => 'nullable|file|mimes:pdf',
        ]);

        if ($request->hasFile('lampiran_ktp')) {
            $ktpPath = $request->file('lampiran_ktp')->store('public/ktp-penyewa');
            $validated['lampiran_ktp'] = basename($ktpPath);
        }

        if ($request->hasFile('surat_kontrak')) {
            $kontrakPath = $request->file('surat_kontrak')->store('public/surat-kontrak');
            $validated['surat_kontrak'] = basename($kontrakPath);
        }

        $tanggal_mulai = Carbon::parse($validated['tanggal_mulai']);
        $tanggal_berakhir = $this->calculateEnddate($tanggal_mulai, $validated['periode_sewa']);

        $booking = new Booking($validated);
        $booking->tanggal_berakhir = $tanggal_berakhir;
        $booking->save();

        $property = Property::find($validated['property_id']); // Temukan properti berdasarkan ID
        if ($property) {
            $property->status = 'rented'; // Ubah status menjadi 'rented'
            $property->save();  // Simpan perubahan
        }

        return redirect()->route('books.index')->with('success', 'Booking berhasil dibuat!');
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
            'pelunasan' => $request->pelunasan,
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
}
