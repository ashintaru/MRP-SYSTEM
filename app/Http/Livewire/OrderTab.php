<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrderTab extends Component
{
    public $mats,$mot;
    public function mount($material1,$month){
        $this->mats = $material1;
        $this->mot = $month;
    }
    public function render()
    {
        return view('livewire.order-tab');
    }
}
