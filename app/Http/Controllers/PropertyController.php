<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
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
            'images.*' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $property = Property::create($validatedData);

        if ($request->hasFile('images')) {
            $totalSize = 0;
    
            foreach ($request->file('images') as $image) {
                $totalSize += $image->getSize(); 
            }
    
            if ($totalSize > 104857600) {
                return back()->with('error', 'Total ukuran file terlalu besar. Maksimal total 100MB.');
            }
    
            $property = Property::create($validatedData);
    
            foreach ($request->file('images') as $image) {
                $path = $image->store('properties', 'public');
                $property->images()->create([
                    'property_id' => $property->id,
                    'image_path' => $path,
                ]);
            }

            return redirect()->route('properties.index')->with('success', 'Property berhasil ditambahkan.');
        }
    }

    public function show($id)
    {
        $property = Property::find($id); 
        
        return view('properties.detail', compact('property'));
    }
}
