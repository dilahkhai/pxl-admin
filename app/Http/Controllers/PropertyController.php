<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Property;
use App\Models\Booking;
use App\Models\BookingHistory;
use Carbon\Carbon;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('property', compact('properties'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'pemilik'           => 'required|string|max:255',
            'agent'             => 'required|string|max:255',
            'developer'         => 'required|string|max:255',
            'type'              => 'required|string|max:255',
            'description'       => 'required|string|max:255',
            'address'           => 'required|string|max:255',
            'tahun_perolehan'   => 'required|string|max:255',
            'jumlah_tingkat'    => 'required|string|max:255',
            'LT'                => 'required|string|max:255',
            'LB'                => 'required|string|max:255',
            'sertifikat'        => 'required|string|max:255',
            'penggunaan'        => 'req|in:Dijual,Disewakan,Dikosongkan,Renovasi',
            'periode_sewa'      => 'nullable|in:1 tahun,6 bulan,3 bulan,bulanan',
            'status_pbb'        => 'required|in:sudah bayar,belum bayar',
            'harga_penawaran'   => 'required|numeric|min:0',
            'deposit_sewa'      => 'required|numeric|min:0',
            'harga_jual'        => 'required|numeric|min:0',
            'listrik'           => 'nullable|string|max:255',
            'air'               => 'nullable|in:PDAM,aretsis',
            'ipl'               => 'required|numeric|min:0',
            'rate_komisi'       => 'required|numeric|min:0',
            'status'            => 'required|in:available,rented,sold',
            'photo_path'        => 'required|file|mimes:jpg,jpeg,png,pdf',
        ]);


        $property = new Property($validated);
        $proprty->save();

        return redirect()->route('properties.store')->with('success', 'Booking berhasil dibuat!');
    }


}
