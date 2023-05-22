<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\production;
use Illuminate\Support\Carbon;
use App\Models\models as modelo;

use App\Models\productionList;


class ProdGenReport extends Component
{
   public $modelCode,$timeFrame,$target,$modelName;
   public function mount($key1,$key2){
        $this->modelCode = $key1;
        if(is_numeric($this->timeFrame))
        $this->timeFrame = $key2;
        else
        $this->timeFrame = 3;
    }
    public function render()
    {

        if($this->modelCode==0){
            $dt = Carbon::now()->format('Y-m-d');
            $newDate = Carbon::now()->subMonth($this->timeFrame)->format('Y-m-d');
            $title = 'Production From'. ' '.Carbon::parse($newDate)->format('F d Y').' - '.Carbon::parse($dt)->format('F d Y');
            $list = production::join('model','model.modelId','=','production.modelCode')->whereBetween('productionLeadTime',[$newDate,$dt])->orderby('productionCreated','ASC')->get();
            $data = json_decode($list,true);
            $this->modelName = 'aLL Model';
        }else{
            $model = modelo::findOrFail($this->modelCode);
            $dt = Carbon::now()->format('Y-m-d');
            $newDate = Carbon::now()->subMonth($this->timeFrame)->format('Y-m-d');
            $title = 'Production From'. ' '.Carbon::parse($newDate)->format('F d Y').' - '.Carbon::parse($dt)->format('F d Y');
            $list = production::join('model','model.modelId','=','production.modelCode')->where('modelId',$this->modelCode)->whereBetween('productionLeadTime',[$newDate,$dt])->orderby('productionCreated','ASC')->get();
            $data = json_decode($list,true);
            $this->modelName = $model->modelName;
        }

        if(session()->has('accId'))
            return view('livewire.prod-gen-report',['list'=>$data,'tf'=>$title ]);
        else
        return  view('livewire.defender');
    }
}
