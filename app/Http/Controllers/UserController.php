<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penyewaan;
use App\Models\mobil;
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
        return view('user.riwayat-penyewaan', compact('penyewaans'));
    }

    public function historyRentDetail($id)
    {
        $penyewaan = penyewaan::with('mobils')->findOrFail($id);
        return view('user.detail-riwayat', compact('penyewaan'));
    }
}
