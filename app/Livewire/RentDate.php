<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class RentDate extends Component
{
    public $type = 'pribadi';
    public $startDate;
    public $endDate;

    public function setType($type)
    {
        $this->type = $type;
    }

    public function searchCars()
    {
        // Simpan tanggal ke dalam session
        Session::put('startDate', $this->startDate);
        Session::put('endDate', $this->endDate);

        // Arahkan ke halaman pemilihan mobil
        return view('livewire.car-selection');
    }

    public function render()
    {
        return view('livewire.rent-date');
    }
}
