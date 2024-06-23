<?php

namespace App\Livewire;

use Livewire\Component;

class RentDate extends Component
{
    public $type = 'pribadi';

    public function setType($type)
    {
        $this->type = $type;
    }

    public function render()
    {
        return view('livewire.rent-date');
    }
}
