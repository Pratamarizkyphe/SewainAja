<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penyewaan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $mobils = DB::table('mobils')->count();
        $users = DB::table('users')
                        ->where('role', 'user')
                        ->count();
    
        $penyewaans = DB::table('penyewaans')->count();
    
        return view('admin.dashboard', compact('mobils', 'users','penyewaans'));

    }

    public function totalIncome()
    {
        $this->delete_log_penghasilan();
        $totalIncome = penyewaan::where('status_pembayaran', 'Sudah Lunas')->sum('harga_sewa');
        return view('admin.log-penghasilan', compact('totalIncome'));
    }

    public function delete_log_penghasilan(){
        // Tentukan tanggal satu bulan yang lalu
        $oneMonthAgo = Carbon::now()->subMonth();

        // Hapus log yang lebih tua dari satu bulan
        DB::table('log_penghasilans')
            ->where('created_at', '<', $oneMonthAgo)
            ->delete();
    }

    public function dataPenyewaan()
    {
        $penyewaans = penyewaan::all();
        return view('admin.data-penyewaan', compact('penyewaans'));
    }

    public function verifyPayment($id)
    {
        $penyewaan = penyewaan::find($id);
        $penyewaan->status_pembayaran = 'Sudah Lunas';
        $penyewaan->save();
        return redirect()->route('admin.data-penyewaan')->with('status', 'Pembayaran berhasil diverifikasi.');
    }

    public function detailShow($id)
    {
        $penyewaan = penyewaan::with('mobils')->findOrFail($id);
        return view('admin.detail-penyewaan', compact('penyewaan'));
    }

    public function destroy($id)
    {
        $penyewaan = penyewaan::find($id);
        $penyewaan->delete();
        return redirect()->route('admin.data-penyewaan')->with('status', 'Penyewaan berhasil dihapus.');
    }

    public function approveCancel($id)
    {
        $penyewaan = penyewaan::find($id);
        $penyewaan->update(['status_pembayaran' => 'Dibatalkan']);

        return redirect()->back()->with('status', 'Permintaan pembatalan berhasil disetujui.');
    }

    public function rejectCancel($id)
    {
        $penyewaan = penyewaan::find($id);
        $penyewaan->update(['status_pembayaran' => 'Sudah Lunas']);

        session()->flash('status', 'Permintaan pembatalan berhasil ditolak.');
        return redirect()->back()->with('status', 'Permintaan pembatalan berhasil ditolak.');
    }
}
