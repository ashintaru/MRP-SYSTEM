<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\productionList;

class Orders extends Component
{

    public $input;
    public $title;
    public $memo;
    public $finalDate;

    public function see(){
        return dd($this->input);
    }

    public function render()
    {
        return view('livewire.orders');
    }
    public function hi(){
        return dd('Hi I am been clicked',[
        ]);
    }
    public function store(){
        // return dd($this->title);
        $validateData = $this->validate([
            'title' => 'required',
            'memo' => 'required',
            'finalDate' => 'required'
        ]);
        $this->emit('addedProdList');
        productionList::create(
            [
                'productionlist' =>'3',
                'title'=>$this->title,
                'memo'=>$this->memo,
                'created_at'=>$this->finalDate,
                'update_at'=>$this->finalDate,
                'finalDate'=>$this->finalDate

            ]);
    }
}
