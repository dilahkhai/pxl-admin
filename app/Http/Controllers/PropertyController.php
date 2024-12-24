<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    // Display all properties
    public function index()
    {
        $properties = Property::all();
        return view('properties.list_props', compact('properties'));
    }

    public function create()
    {
        return view('properties.property');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pemilik' => 'required|string|max:255',
            'agent' => 'required|string|max:255',
            'developer' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'tahun_perolehan' => 'required|string|max:255',
            'jumlah_tingkat' => 'required|string|max:255',
            'LT' => 'required|string|max:255',
            'LB' => 'required|string|max:255',
            'sertifikat' => 'required|string|max:255',
            'penggunaan' => 'required|in:Dijual,Disewakan,Dikosongkan,Renovasi',
            'periode_sewa' => 'nullable|in:1 tahun,6 bulan,3 bulan,bulanan',
            'status_pbb' => 'required|in:sudah bayar,belum bayar',
            'harga_penawaran' => 'required|numeric|min:0',
            'deposit_sewa' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'listrik' => 'nullable|string|max:255',
            'air' => 'nullable|in:PDAM,artesis',
            'ipl' => 'required|numeric|min:0',
            'rate_komisi' => 'required|numeric|min:0',
            'status' => 'required|in:available,rented,sold',
            'photo_path' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('photo_path')) {
            $path = $request->file('photo_path')->store('properties', 'public');
            $validatedData['photo_path'] = $path;
        }

        Property::create($validatedData);

        return redirect()->route('properties.index')
            ->with('success', 'Property berhasil ditambahkan.');
    }

    public function show($id){
        // manggil data per-id (1 atau by id)
        // return $param;

        $properties = Property::where('id', $id)->first();
        return view('properties.detail', compact('properties')) ;       
    }

}
