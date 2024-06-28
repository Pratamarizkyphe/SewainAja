<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penyewaan;
use App\Models\mobil;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function historyRent()
    {
    
        $penyewaans = penyewaan::where('user_id', Auth::id())->get();
        // $penyewaan= penyewaan::where('created_at', '<', Carbon::now()->subDays(1)) and where('status', '==', 'diproses')->delete();

        $penyewaan = Penyewaan::where('created_at', '<', Carbon::now()->subHours(1))
                       ->where('status_pembayaran', 'diproses')
                       ->delete();


        return view('user.riwayat-penyewaan', compact('penyewaans'));
    }

    public function updatePenyewaan(){

    }

    public function historyRentDetail($id)
    {
        $penyewaan = penyewaan::with('mobils')->findOrFail($id);
        return view('user.detail-riwayat', compact('penyewaan'));
    }
}
