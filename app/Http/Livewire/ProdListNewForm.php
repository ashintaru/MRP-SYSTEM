<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProdListNewForm extends Component
{
    public $title;
    public $memo;
    public $finalDate;
    public function render()
    {
        return view('livewire.prod-list-new-form');
    }
    public function store(){
        return dd($this->title);
        $validateData = $this->validate([
            'title' => 'required',
            'memo' => 'required',
            'finalDate' => 'required'
        ]);
        $this->emit('addedProdList');
        // productionList::create(
        //     [
        //         'productionlist' =>'3',
        //         'title'=>'roasa',
        //         'memo'=>'pogi',
        //         'created_at'=>'01/01/2021',
        //         'update_at'=>'01/01/2021',
        //         'finalDate'=>'01/01/2021'

        //     ]);
    }

}
