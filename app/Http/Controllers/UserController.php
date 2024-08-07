<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penyewaan;
use App\Mail\TestEmail;
use App\Models\mobil;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mime\Part\TextPart;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
     
    }

    public function historyRent()
    {
    
        $penyewaans = penyewaan::where('user_id', Auth::id())->get();
        $this->deleteUnpaidRentals();
        return view('user.riwayat-penyewaan', compact('penyewaans'));
    }

    public function historyRentDetail($id)
    {
        $penyewaan = penyewaan::with('mobils')->findOrFail($id);
        return view('user.detail-riwayat', compact('penyewaan'));
    }

    public function deleteUnpaidRentals()
   {
    Penyewaan::where('created_at', '<', Carbon::now()->subMinutes(30))
                       ->where('status_pembayaran', 'Belum Dibayar')
                       ->delete();
   } 

   public function cancelRental($id)
    {
        $penyewaan = penyewaan::find($id);
        if ($penyewaan) {
            $penyewaan->update(['status_pembayaran' => 'Proses Pembatalan']);

            return redirect()->back()->with('status', 'Penyewaan dalam proses pembatalan.');
        }

        return redirect()->back()->with('error', 'Gagal membatalkan penyewaan. Cek kembali data penyewaan.');
    }

    // public function sendMail(){

    //     Mail::to('pratarizky249b@gmail.com')->send(new TestEmail());
    //     return View('view.contact');
    // }

  public function getMailText(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Debugging
        // dd($validated);

        Mail::to('pratamarizky249b@gmail.com')->send(new TestEmail($validated['name'], $validated['email'], $validated['message']));

        return back()->with('success', 'Email berhasil dikirim!');
    }
}