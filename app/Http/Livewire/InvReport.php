<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\inventory as ibentory;
USE App\Models\invLogs;
use Livewire\WithPagination;
use App\Models\material;
use Carbon\Carbon;


class InvReport extends Component
{
    public $date;

    public function render()
    {
        $this->date = Carbon::now()->format('Y-m-d');
        $inventory = ibentory::join('materials','materials.materialId','=','inventory.materialId')
       ->orderBy('materialCode','ASc')->get();
        return view('livewire.inv-report',['list'=>$inventory]);
    }
}
