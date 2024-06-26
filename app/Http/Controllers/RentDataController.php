<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penyewaan;

class RentDataController extends Controller
{
    public function index()
    {
        $penyewaans = Penyewaan::all();
        return view('admin.data-penyewaan', compact('penyewaans'));
    }

    public function verifyPayment($id)
    {
        $penyewaan = Penyewaan::find($id);
        $penyewaan->status_pembayaran = 'lunas';
        $penyewaan->save();
        return redirect()->route('admin.data-penyewaan')->with('status', 'Pembayaran berhasil diverifikasi.');
    }

    public function detailShow($id)
    {
        $penyewaan = Penyewaan::find($id);
        return view('admin.detail-penyewaan', compact('penyewaan'));
    }

    public function destroy($id)
    {
        $penyewaan = Penyewaan::find($id);
        $penyewaan->delete();
        return redirect()->route('admin.data-penyewaan')->with('status', 'Penyewaan berhasil dihapus.');
    }

}
