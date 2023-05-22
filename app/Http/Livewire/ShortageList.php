<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\shortageMats;


class ShortageList extends Component
{
    public $listId;

    public function mount($listId){
        $this->listId = $listId;
    }

    public function render()
    {   
        $list = shortageMats::where('shortagelistId',$this->listId)->get();
        return view('livewire.shortage-list',['mats'=>$list]);
    }
}
