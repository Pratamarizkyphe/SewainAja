<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mobil;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MobilController extends Controller
{
        public function index() 
        {
        $mobils = mobil::paginate(10);

        // untuk mwngambil keyword yang dimasukkan dalam search box
        // if(request('search')) {
        //     $mobils->where('nama', 'like', '%' . request('search') . '%')
        //     ->orWhere('merk', 'like', '%' . request('search') . '%');
        // }
         // Fetch paginated list of cars
        return view('admin.data-mobil', compact('mobils'));

    }

    public function create()
    {
       
        return view('admin.create');

    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|max:255|min:2',
            'merk' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tahun' => 'required',
            'warna' => 'required',
            'harga_sewa' => 'required',
            'nomor_plat' => 'required',
            'ready' => 'required',
        ]);
    
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/mobil', $gambar->hashName());

        mobil::Create([
            'merk' => $request['merk'],
            'nama' => $request['nama'],
            'tahun' => $request['tahun'],
            'warna' => $request['warna'],
            'harga_sewa' => $request['harga_sewa'],
            'nomor_plat' => $request['nomor_plat'],
            'gambar' => $gambar->hashName(),
            'ready' => $request['ready'],
            

        ]);

        return redirect('/admin/data-mobil')->with('status', 'mobil berhasil ditambahkan!');
    }

    public function show(String $mobil)
    {
        $mobil = mobil::findOrFail($mobil);
        return view('admin.detail-mobil', compact('mobil'));
    }

    public function edit(String $mobil)
    {
        $mobil = mobil::findOrFail($mobil);
        // return view('admin.edit', [
        //     "mobil" => $mobil
        // ]);
         return view('admin.edit', compact('mobil'));
    }

public function update(Request $request, $id)
{
    // Log::info('Request Data:', $request->all());

    $request->validate([
        'nama' => 'required|max:255|min:2',
        'merk' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Ganti required dengan nullable
        'tahun' => 'required',
        'warna' => 'required',
        'harga_sewa' => 'required',
        'nomor_plat' => 'required',
        'ready' => 'required',
    ]);

    $mobil = mobil::findOrFail($id);

    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $gambarName = $gambar->hashName();
        $gambar->storeAs('public/mobil', $gambarName);

       
        Storage::delete('public/mobil/' . $mobil->gambar);
    

        // Update dengan gambar baru
        $mobil->update([
            'merk' => $request['merk'],
            'nama' => $request['nama'],
            'tahun' => $request['tahun'],
            'warna' => $request['warna'],
            'harga_sewa' => $request['harga_sewa'],
            'nomor_plat' => $request['nomor_plat'],
            'gambar' => $gambarName,
            'ready' => $request['ready'],

        ]);
    } else {
        // Update tanpa gambar
        $mobil->update([
            'merk' => $request['merk'],
            'nama' => $request['nama'],
            'tahun' => $request['tahun'],
            'warna' => $request['warna'],
            'harga_sewa' => $request['harga_sewa'],
            'nomor_plat' => $request['nomor_plat'],
            'ready' => $request['ready'],
        ]);
    }

    return redirect()->route('mobils.index')->with('status', 'Mobil berhasil diperbarui!');
}


public function destroy($id)
    {
        // Find the mobil by ID and delete it
        
        $mobil = mobil::findOrFail($id);
        Storage::delete('public/mobil/'. $mobil->gambar);
        $mobil->delete();
       

        // Redirect or return response after deleting
        return redirect()->route('mobils.index')->with('success', 'mobil deleted successfully');
    }

    public function info(mobil $mobil)
    {
        return view('mobil.info-mobil', [
            "title" => "Informasi mobil",
            "active" => 'mobil',
            "mobil" => $mobil
        ]);
    }

   

}
