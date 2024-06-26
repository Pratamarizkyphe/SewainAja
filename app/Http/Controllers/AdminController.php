<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyewaan;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');

    }

    public function totalIncome()
    {
        $totalIncome = penyewaan::where('status_pembayaran', 'lunas')->sum('harga_sewa');
        
        return view('admin.log-penghasilan', compact('totalIncome'));
    }
}
