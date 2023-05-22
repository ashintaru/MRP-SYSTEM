<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\orderList;
use App\Models\orders;
use App\Models\material;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\inventory;

class OrderReport extends Component
{
    
    public $listid;

    public function mount($id){
        $this->listid = $id;
    }
    public function render()
    {
        $List = orderList::findOrFail($this->listid);
        $data1 = json_decode($List,true);
        $orders = orders::where('ordListId',$this->listid)->join('materials','materials.materialId','=','orders.materialCode')->join('origin','origin.vendorId','=','materials.vendorId')->get();
        $material = material::select('materialId','materialCode')->where('isActive',1)->get();
        $data3 = json_decode($material,true);
        $dt = Carbon::now()->format('Y-m-d');


        if(session()->has('accId'))
            return view('livewire.order-report' ,['order'=>$data1,'lists'=>$orders,'materials'=>$data3,'index'=>1,'data4'=>$orders]);
        else
            return  view('livewire.defender');
    }
}
