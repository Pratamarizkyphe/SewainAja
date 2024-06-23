<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mobil;

class MobilController extends Controller
{
         public function index() {

        
        $mobils = Mobil::paginate(10);

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
       $mobils = mobil::get();

        return view('mobil.create-mobil', [
            "title" => "Tambah mobil",
            "active" => 'mobil',
            "mobils" => $mobils
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|max:255|min:2',
            'alamat' => 'required'
        ]);

        mobil::firstOrCreate([
            'nama_mobil' => $request['nama'],
            'alamat' => $request['alamat'],
            'created_by' => $request['created_by']
        ]);

        return redirect('/mobil')->with('status', 'mobil berhasil ditambahkan!');
    }

    public function edit(mobil $mobil)
    {
        return view('mobil.edit-mobil', [
            "title" => "Tambah mobil",
            "active" => 'mobil',
            "mobil" => $mobil
        ]);
    }

    public function update(mobil $mobil)
    {
        request()->validate([
            'nama' => 'required|max:255|min:2',
            'alamat' => 'required'
        ]);

        $mobil->update([
            'nama_mobil' => request('nama'),
            'alamat' => request('alamat'),
            'edited_by' => request('edited_by')
        ]);

        return redirect('/mobil')->with('status', 'mobil berhasil diupdate!');
    }

public function destroy($id)
    {
        // Find the mobil by ID and delete it
        $mobil = mobil::findOrFail($id);
        $mobil->delete();

        // Redirect or return response after deleting
        return redirect('/mobil')->with('success', 'mobil deleted successfully');
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
