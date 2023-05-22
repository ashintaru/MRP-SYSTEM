<?php

namespace App\Http\Livewire;
use App\Models\production;
use App\Models\masterList;
use App\Models\componets;
use App\Models\models;
use Illuminate\Support\Carbon;


use Livewire\Component;

class Forecasting extends Component
{

    public $modelid , $zscore ,$timeframe;

    public function mount($key1,$key2,$key3){
        $this->modelid = $key1;
        $this->zscore = $key2;
        $this->timeframe = $key3;
    }
    public function render()
    {
        $model=models::findOrFail($this->modelid);


        if(is_numeric( $this->timeframe)){
            $leadTime = $this->timeframe *30;
        }
        else
            $leadTime = 3;
            $dt = Carbon::now()->format('Y-m-d');
            $newDate = Carbon::now()->subMonth($leadTime)->format('Y-m-d');
        
    
        $prList = production::where('masterlist.modelCode',$this->modelid)->join('masterlist','masterlist.modelCode','=','production.modelCode')
        ->whereBetween('productionUpdate',[$newDate,$dt])
        ->get();

        $data = json_decode($prList,true);
        $newArray = array();
        $total=0;
        foreach($data as $d){
            array_push($newArray,$d['productQtty']);
            $total += $d['productQtty'];
        }

        
        // return dd($prList);

        // return dd($data);

        $dv = $this->std_deviation($newArray);

        $masterlist = masterList::where('modelCode',$this->modelid)->first();
        // return dd($masterlist['listId']);

        $components = componets::where('listId',$masterlist['listId'])->join('materials','materials.materialId','component.materialId')->join('origin','origin.vendorId','=','materials.vendorId')->get();
        $data2 = json_decode($components,true);
        // return dd($data2);

        $newArray1 = array();
        $header = array();
        foreach($data2 as $d)
        {
            $array = array();        
            $leadTimeDays = $d['vendorLeadTime'] * 30;
            
            if(is_numeric( $this->zscore)){
                $ZSCORE = $this->zscore;
            }
            else
            $ZSCORE = 0;
            $aveDailyDemenads = $total / $leadTime;
            $demandDLT = $aveDailyDemenads * $leadTimeDays;
            $SAFETYSTOCK = $ZSCORE*$dv*sqrt($leadTimeDays);
            $ROP = $demandDLT + $SAFETYSTOCK;
            array_push($array,$d['materialCode']); 
            array_push($array,number_format($ROP, 0));
            array_push($array,number_format($SAFETYSTOCK, 0));
            array_push($array,number_format($dv, 0));
            array_push($array,$demandDLT);
            array_push($array,$leadTimeDays);
            array_push($newArray1,$array);

        }
        $index = count($newArray1);
    

        // return dd($model);

        if(session()->has('accId'))
        return view('livewire.forecasting',['data'=>$newArray1,'pr'=>$data,'index'=>$index,'count'=>6,'mt'=>$data2,'model'=>$model ]);
        else
        return  view('livewire.defender');

    }

    public function std_deviation($arr){
        
        $arr_size=count($arr);
        if($arr_size == 0){
            return 0;
        }else{
            $mu=array_sum($arr)/$arr_size;
            $ans=0;
            foreach($arr as $elem){
                $ans+=pow(($elem-$mu),2);
            }
            return sqrt($ans/$arr_size);
        }
    }
}
