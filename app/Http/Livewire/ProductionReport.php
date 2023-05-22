<?php

namespace App\Http\Livewire;
use App\Models\production;
use App\Models\productionList;
use Livewire\Component;

class ProductionReport extends Component
{
    public $listId;
    public function mount($key1){
        $this->listId = $key1;

    }
    public function render()
    {


        $prlist = productionList::findOrFail($this->listId);
        $list = production::where('listId',$this->listId)->join('model','model.modelId','=','production.modelCode')->get();
        $data = json_decode($list,true);
        // return dd($data);
        if(session()->has('accId'))
            return view('livewire.production-report',['list'=>$data,'prList'=>$prlist]);
        else
            return  view('livewire.defender');
    }
}
