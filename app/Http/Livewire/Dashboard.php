<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\inventory;
use App\Models\orders;
use App\Models\production;

class Dashboard extends Component
{
    public function render()
    {
        $pProd = production::where('productionStatus',0)->join('model','model.modelId','=','production.modelCode')
        ->join('productionlist','productionlist.idProductionList','=','production.listId')
        ->where('productionlist.isActive',1)
        ->select(['modelName','productQtty','listId'])->get();
        $dt = Carbon::now()->format('Y-m-d');
        $newDate = Carbon::now()->addDays(7)->format('Y-m-d');
        $orders = orders::where('orderStatus',0)->join('orderlist','orderlist.orderListId','=','orders.ordListId')->join('materials','orders.materialCode','=','materials.materialId')->whereBetween('orderDate',[$dt,$newDate])->get();
        $data1 = json_decode($orders,true);
        $lowestInv = inventory::select(['materialCode','currentQtty'])->where('currentQtty','<>',0)->orderBy('currentQtty','ASC')->join('materials','inventory.materialId','=','materials.materialId')->offset(0)->limit(5)->get();
        $data2 = json_decode($lowestInv,true);
        $higesttInv = inventory::select(['materialCode','currentQtty'])->orderBy('currentQtty','DESC')->join('materials','inventory.materialId','=','materials.materialId')->offset(0)->limit(5)->get();
        $data3 = json_decode($higesttInv,true);
        $nullInv = inventory::select(['materialCode','currentQtty'])->where('currentQtty','==',0)->orderBy('currentQtty','ASC')->join('materials','inventory.materialId','=','materials.materialId')->get();
        $array = array();
        $warInv = inventory::select(['materialCode','currentQtty','threshold'])->join('materials','inventory.materialId','=','materials.materialId')->get();
        
        foreach($warInv as $key){
            if($key['threshold']>$key['currentQtty'] ){
                array_push($array,$key);
            }
       }
        $data4 = json_decode($nullInv,true);
        $warning = count($array);
        $orderP = count($data1);
        $nullM = count($data4);

        // return dd($pProd);
        return view('livewire.dashboard',['order'=>$data1,'least'=>$data2,'high'=>$data3,'warning'=>$array,'null'=>$data4,'wc'=>$warning ,'c'=>$orderP,'n'=>$nullM,'pp'=>$pProd]);
    }

    public function view($id)
    {
            return redirect()->to('product/'.$id);
    }
}
