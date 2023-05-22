<?php

namespace App\Http\Livewire;

use Livewire\Component;
USE App\Models\invLogs as logs;
use Livewire\WithPagination;
use App\Models\material;
use Carbon\Carbon;

class InvLogs extends Component
{
    use WithPagination;
    public $search2,$filter1 ="ASC",$filter3;
    public function render()
    {
        $search3 = '%'.$this->search2.'%';  
        $logs = logs::join('materials','materials.materialId','=','loginv.materialId')->where('materialCode','LIKE',$search3)
        ->where('action','LIKE',$this->filter3)->orderBy('date',$this->filter1)->get();
        // return dd($logs);
        return view('livewire.inv-logs',['list'=>$logs]);
    }
}
