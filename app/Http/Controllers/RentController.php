<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mobil;
use Carbon\Carbon;

class RentController extends Controller
{
   public function selectDate(Request $request)
{
    $availableCars = [];
    $type = $request->input('type');
    $startDate = $request->input('startDate');
    $endDate = $request->input('endDate');

    if ($startDate && $endDate) {
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);

        // dd ($start);
        // dd ($end);

        // $range_date = floor($start->diffInDays($end));

        // dd ($range_date);

        

        if ($type == 'individu' && $start->diffInDays($end) < 1) {
            // dd ($range_date);
            return redirect()->back()->with('error', 'Individu harus menyewa minimal 1 hari.')->withInput();
        } elseif ($type == 'perusahaan' && $start->diffInYears($end) < 1) {
            return redirect()->back()->with('error', 'Perusahaan harus menyewa minimal 1 tahun.')->withInput();
        }

        // Mengambil mobil yang tersedia pada rentang tanggal yang dipilih
        $availableCars = mobil::whereDoesntHave('penyewaans', function ($query) use ($startDate, $endDate) {
            $query->where(function ($q) use ($startDate, $endDate) {
                $q->whereBetween('start_date', [$startDate, $endDate])
                    ->orWhereBetween('end_date', [$startDate, $endDate])
                    ->orWhereRaw('? BETWEEN start_date AND end_date', [$startDate])
                    ->orWhereRaw('? BETWEEN start_date AND end_date', [$endDate]);
            });
        })->get();
    }

    return view('rent.index', compact('availableCars', 'startDate', 'endDate', 'type'));
}


    public function fillForm(Request $request)
    {
        $car_id = $request->input('car_id');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $carDetails = Mobil::find($car_id);

        return view('rent.rent-form', compact('carDetails', 'startDate', 'endDate'));
    }

    
}

