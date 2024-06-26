<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mobil;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\penyewaan;

class RentController extends Controller
{
   public function selectDate(Request $request)
{
    $availableCars = [];
    $type = $request->input('type');
    $startDate = $request->input('startDate');
    $endDate = $request->input('endDate');
    $rangeDate = $request->input('rangeDate');

    if ($startDate && $endDate) {
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);
        $rangeDate = $start->diffInDays($end);
        

        if ($type == 'individu' && $start->diffInDays($end) < 1) {
            // dd ($range_date);
            return redirect()->back()->with('error', 'Individu harus menyewa minimal 1 hari.')->withInput();
        } elseif ($type == 'perusahaan' && $start->diffInYears($end) < 1) {
            return redirect()->back()->with('error', 'Perusahaan harus menyewa minimal 1 tahun.')->withInput();
        }

        // Mengambil mobil yang tersedia pada rentang tanggal yang dipilih dan tidak ada dalam database penyewaan 
        $availableCars = mobil::whereDoesntHave('penyewaans', function ($query) use ($startDate, $endDate) {
            $query->where(function ($q) use ($startDate, $endDate) {
                $q->whereBetween('start_date', [$startDate, $endDate])
                    ->orWhereBetween('end_date', [$startDate, $endDate])
                    ->orWhereRaw('? BETWEEN start_date AND end_date', [$startDate])
                    ->orWhereRaw('? BETWEEN start_date AND end_date', [$endDate]);
            });
        })->get();
    }

    // dd($type);
    return view('rent.index', compact('availableCars', 'startDate', 'endDate', 'type','rangeDate'));
}


    public function fillForm(Request $request)
    {
        $rangeDate = $request->input('rangeDate');
        $car_id = $request->input('car_id');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $type = $request->input('type');
        // $user=user::find()

        $carDetails = mobil::find($car_id);
        $harga_bayar = $carDetails->harga_sewa * $rangeDate;

        // dd($harga_sewa);
        var_dump($harga_bayar);

        return view('rent.rent-form', compact('carDetails', 'startDate', 'endDate', 'rangeDate','harga_bayar','type'));
    }

    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
                'mobil_id' => 'required|exists:mobils,id',
                'user_id' => 'required|exists:users,id',
                'nama' => 'required|max:255|min:2',
                'start_date' => 'required',
                'end_date' => 'required',
                'harga_sewa' => 'required',
                'type' => 'required|in:individu,perusahaan',
            ]);

            penyewaan::Create([
                'mobil_id' => $request->input('mobil_id'),
                'user_id' => $request->input('user_id'),
                'nama' => $request->input('nama'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'harga_sewa' => $request->input('harga_sewa'),
                'type' => $request->input('type'),
            ]);

            return redirect()->route('selectDate')->with('status', 'Penyewaan berhasil ditambahkan!');
    }


    public function showPaymentForm(Request $request)
    {
        Session::put('rental_details', $request->all());
        return view('rent.payment');
    }

    public function processPayment(Request $request)
    {
        // Verifikasi pembayaran (simulasi untuk sekarang)
        $paymentSuccessful = true; // Simulasikan pembayaran berhasil

        if ($paymentSuccessful) {
            // Ambil data penyewaan dari sesi
            $rentalDetails = Session::get('rental_details');

            // Simpan data penyewaan ke database
            Penyewaan::create([
                'mobil_id' => $rentalDetails['mobil_id'],
                'user_id' => $rentalDetails['user_id'],
                'nama' => $rentalDetails['nama'],
                'start_date' => $rentalDetails['start_date'],
                'end_date' => $rentalDetails['end_date'],
                'harga_sewa' => $rentalDetails['harga_sewa'],
                'type' => $rentalDetails['type'],
            ]);

            // Hapus data penyewaan dari sesi
            Session::forget('rental_details');

            // Redirect ke halaman sukses pembayaran
            return redirect()->route('paymentSuccess')->with('status', 'Pembayaran berhasil dan penyewaan telah disimpan.');
        } else {
            // Jika pembayaran gagal, redirect kembali ke halaman pembayaran dengan pesan error
            return redirect()->route('showPaymentForm')->with('error', 'Pembayaran gagal. Silakan coba lagi.');
        }
    }

    
}

