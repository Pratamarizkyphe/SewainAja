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

        if ($type == 'perusahaan') {
            $years = $request->input('years', 1);
            $years = (int) $years;
            $endDate = Carbon::parse($startDate)->addYears($years)->format('Y-m-d');
        }

        // Mengambil mobil yang tersedia pada rentang tanggal yang dipilih dan tidak ada dalam database penyewaan 
        $availableCars = mobil::whereDoesntHave('penyewaans', function ($query) use ($startDate, $endDate) {
            $query->where(function ($q) use ($startDate, $endDate) {
                $q->whereBetween('start_date', [$startDate, $endDate])
                    ->orWhereBetween('end_date', [$startDate, $endDate])
                    ->orWhereRaw('? BETWEEN start_date AND end_date', [$startDate])
                    ->orWhereRaw('? BETWEEN start_date AND end_date', [$endDate]);
            })->whereIn('status_pembayaran', ['Belum Dibayar', 'Sedang Diproses', 'Sudah Lunas']);
        })->where('ready', 1)->get();
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

            $penyewaan = penyewaan::Create([
                'mobil_id' => $request->input('mobil_id'),
                'user_id' => $request->input('user_id'),
                'nama' => $request->input('nama'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'harga_sewa' => $request->input('harga_sewa'),
                'type' => $request->input('type'),
                'status_pembayaran' => 'Belum Dibayar'
            ]);

            Session::put('rental_details', $penyewaan);
            return redirect()->route('showPaymentForm')->with('status', 'Penyewaan berhasil ditambahkan. Segera lakukan Pembayaran');
    }


    public function showPaymentForm(Request $request)
    {
        $rentalDetails = Session::get('rental_details');
        if (!isset($rentalDetails['id'])) {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
        // Ambil data penyewaan dari database
        $penyewaan = penyewaan::find($rentalDetails['id']);
        if (!$penyewaan) {
            return redirect()->back()->with('error', 'Data penyewaan tidak ditemukan.');
        }

        return view('rent.payment', compact('penyewaan'));
    }

    public function processPayment(Request $request)
    {
        // Verifikasi pembayaran (simulasi untuk sekarang)
        $paymentSuccessful = true; // Simulasikan pembayaran berhasil
        $rentalDetails = Session::get('rental_details');

        if (!$paymentSuccessful || !isset($rentalDetails['id'])) {
            // Jika pembayaran gagal atau data penyewaan tidak valid
            return redirect()->route('showPaymentForm')->with('error', 'Pembayaran gagal. Silakan coba lagi.');
        }

         // Update status pembayaran penyewaan
        $penyewaan = penyewaan::find($rentalDetails['id']);
        if ($penyewaan) {
            $penyewaan->update(['status_pembayaran' => 'Sedang Diproses']);

            // Hapus data penyewaan dari sesi setelah pembayaran berhasil
            Session::forget('rental_details');

            // Redirect ke halaman sukses pembayaran
            return redirect()->route('paymentSuccess')->with('status', 'Pembayaran berhasil. Terimakasih sudah menyewa mobil Kami');
        } else {
            return redirect()->route('showPaymentForm')->with('error', 'Data penyewaan tidak ditemukan. Silakan coba lagi.');
        }
    }

}

