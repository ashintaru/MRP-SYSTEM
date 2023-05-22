<?php

namespace App\Http\Livewire;

use App\Models\orderList;
use App\Models\orders;
use Livewire\Component;
use App\Models\material;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\inventory;

class Order extends Component
{   

    public $listid,$lotSize,$material , $quantity ,$editdate ,$leadtime,$orderId,$show,$action,$search2,$filter3='orderNo',$filter1 ="ASC";

    public function mount($id){
        $this->listid = $id;
    }
    public function erase(){
        $this->material='';
        $this->quantity='';
        $this->show = 0;

    }
    public function render()
    {
        $List = orderList::findOrFail($this->listid);
        if($List->isActive==0 && session('type')=='user'){
            $orders=[];
            $data1=[];
            $List=[];
            $data3=[];
        }else{
        $data1 = json_decode($List,true);
        $search3 = '%'.$this->search2.'%';
        $orders = orders::where('ordListId',$this->listid)->join('materials','materials.materialId','=','orders.materialCode')
        ->join('origin','origin.vendorId','=','materials.vendorId')->join('accounts','accounts.accId','=','orders.accId')->where('materials.materialCode','LIKE',$search3)->orderBy($this->filter3,$this->filter1)->get();
        $materialList = material::join('origin','origin.vendorId','=','materials.vendorId')
        ->select(['materials.materialId','vendorLotSize'])->where('materials.isActive',1)->get();
        $material = material::select(['materials.materialId','materials.materialCode','materialDetailed'])->where('materials.isActive',1)->get();
        $data4  =json_decode($materialList,true);
        $data3 = json_decode($material,true);
        $dt = Carbon::now()->format('Y-m-d');
        foreach ($orders as $key ) {
            if($key->orderStatus==0){
                if($key->orderDate<$dt){
                    $key->orderStatus=1;
                    $invId = $key->inventoryId; 
                    $inventory = inventory::where('materialId',$invId)->first();
                    // return dd($inventory);                    
                    $key->orderTrans = $key->orderQtty;
                    $inventory->currentQtty = $inventory->currentQtty + $key->orderQtty;
                    // $key->orderQtty = 0;
                    $inventory->update();
                    $key->update();
                }
            }
        }
        // return dd($data4[]['vendorLotSize']);
    }
    if(session()->has('accId'))
        return view('livewire.order',['order'=>$data1,'lists'=>$orders,'materials'=>$data3,'index'=>1,'data4'=>$orders,'orList'=>$List,'lotsize'=>$data4]);
    else
        return  view('livewire.defender');

    }

    public function submit(){
        $this->validate([
            'material'=>'required',
            'quantity'=>'required|numeric|min:1|max:99999'
        ]);
        $this->check()!=1?$this->save(): session()->flash('failed','Order have been not Saved');
    }   
    public function save(){
        $List = orderList::findOrFail($this->listid);
        $dt = Carbon::now()->format('Y-m-d');
        $accId = session('accId');   
        $formerDate=Carbon::now()->addMonths($this->leadtime);
        if($formerDate->isWeekday()==false){
            $formerDate->addDay();
        }
        $dateformat = Carbon::parse($formerDate);
        // return dd($formerDate);

        $orderId = uniqid();
        $transmited1 = 0;
        $orderStatus = 0;
        DB::insert('insert into orders 
        (orderNo , ordListId , materialCode , orderQtty , orderTrans , orderCreated , orderUpdate , orderDate , accId , orderStatus ) 
        values (?,?,?,?,?,?,?,?,?,?) ', 
        [$orderId,$this->listid,$this->material,$this->quantity,$transmited1,$dt,$dt,$dateformat->format('Y-m-d'),$accId,$orderStatus] ); 
        $List->orderCount = $List->orderCount + 1;
        $List->update();
        $this->erase();
        session()->flash('message','Order have been save Sucessfull!!!');
    }
    public function checkLotsize(){
        $check ='';
        $mats = material::where('materialId',$this->material)->join('origin','materials.vendorId','=','origin.vendorId')->first();
        $mats->vendorLotSize > $this->quantity ? $check = 1 : $check = 0;
        $this->leadtime = $check == 0 ? $mats->vendorLeadTime : '';
        return $check;
    }
    public function check(){
        $isExsist='';
        $list = orders::where('ordListId',$this->listid)->get();    
        if($list->contains('materialCode',$this->material))
              $isExsist = 1;
        else
            $this->checkLotsize()==1?$isExsist = 1:$isExsist = 0;
        return $isExsist;    
    }
    public function select($ids){
        $list = orders::find($ids);
        $this->orderId = $ids;
        $this->material = $list->materialCode;
        $this->quantity = $list->orderQtty;
        $this->show = 1;
        $this->editdate = $list->orderDate;
        $this->action = 'edit';
        $this->leadtime='';
    }
    public function select1($ids){
        $this->orderId = $ids;
        $this->action = 'approve';
        $this->show = 1;
    }
    public function select2($ids){
        $this->orderId = $ids;
        $this->action = 'delete';
        $this->show = 1;
    }

    public function appove(){
        $dt = Carbon::now()->format('Y-m-d');

        $list = orders::find($this->orderId);
        $inventory = inventory::where('materialId',$list->materialCode)->first();
        $inventory->currentQtty = $inventory->currentQtty + $list->orderQtty; 
        $list->orderTrans = $list->orderQtty;
        $list->orderDate =$dt;
        // $list->orderQtty ;
        $list->orderStatus =1;
        $list->update();
        $inventory->update();
        $this->show = 0;

        session()->flash('message','Order have been aprove Sucessfull!!!');

        // return dd($inventory);
    }

    public function confirm(){
        $list = orders::find($this->orderId);
        $list->delete();
        $List1 = orderList::findOrFail($this->listid);
        $List1->orderCount= $List1->orderCount-1;
        $List1->update();
        session()->flash('delete','Order have been delete Sucessfull!!!');

    }

    public function modifyMats(){
        $dt = Carbon::now()->format('Y-m-d');
        $list = orders::find( $this->orderId );
        $list->materialCode = $this->material;
        $list->orderQtty = $this->quantity; 
        $formerDate=Carbon::now()->addMonths($this->leadtime)->format('Y-m-d');
        $list->orderDate = $formerDate;
        $list->orderUpdate = $dt;
        $list->update();
        session()->flash('message','Order have been Update Sucessfull!!!');

    }
    public function modifyquan(){
        $dt = Carbon::now()->format('Y-m-d');
        $list = orders::find( $this->orderId );
        $list->materialCode = $list->materialCode;
        $mats = material::where('materialId',$list->materialCode)->join('origin','materials.vendorId','=','origin.vendorId')->first();
        $mats->vendorLotSize > $this->quantity ? $check = 1 : $check = 0;

        if($check == 0){
            $list->orderQtty = $this->quantity; 
        }else{
            session()->flash('info','Lot Size check');
            $list->orderQtty = $list->orderQtty;
        }


        $list->orderUpdate = $dt;
        $list->orderDate = $this->editdate;
        $list->update();
        session()->flash('message','Order have been Update Sucessfull!!!');
    }
    public function update(){
        // return dd('hi');
        $this->validate([
            'quantity'=>'required|numeric|min:1|max:99999',
            'editdate'=>'required'
        ]);
        $this->check() !=1 ? $this->modifyMats() : $this->modifyquan();      
        $this->show = 0;


    }
    // public function update1(){
    //     return dd('j');
    //     // $this->check()!=1?$this->modifyMats():dd('found');        
    // }
    public function hide(){
        $this->action = '';
        $this->leadtime='';
        $this->orderId = '';
        $this->show ='';
    }
    public function closed(){
        session()->put('failed',null);
        session()->put('message',null);
        session()->put('delete',null);
    }

}
