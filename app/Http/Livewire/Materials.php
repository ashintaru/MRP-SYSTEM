<?php

namespace App\Http\Livewire;

use App\Models\inventory;
use Livewire\Component;
use App\Models\material;
use App\Models\vendor;
use Livewire\WithPagination;
use Carbon\Carbon;

class Materials extends Component
{
    use WithPagination; 

    public $vendor , $editV;
    public $material , $editM ,$search2,$filter1 ="ASC", $filter2 = "5",$detailed;
    public $threshold, $editT;
    public $select;
    public $show; 
    public $search1;
    public function refresh(){
        return redirect('material');                        

    }
    public function render()
    {
        $search3 = '%'.$this->search2.'%';

        $data1 = material::join('origin','origin.vendorId','=','materials.vendorId')->where('materialCode','LIKE',$search3)->orWhere('materialDetailed','LIKE',$search3)->orderBy('materialCode',$this->filter1)->paginate($this->filter2);
        $data = vendor::where('vendorStatus', 1)
         ->select('vendorId','vendorName','MOT')
         ->orderBy('vendorName','ASC')->get();
        // $data = vendor::all();
        $vendor = json_decode($data,true);
        if(session('type')=='admin')
            return view('livewire.materials',['vendors'=>$vendor,'materials'=>$data1,'index'=>1]);
        else
        return  view('livewire.defender');
    }
    public function invId(){
        $a = inventory::orderby('inventoryId','DESC')->first();
        return $a->inventoryId+1;
    }
    public function submit(){
        // $this->invId();
        $this->found()!=1 ? $this->save() : session()->flash('message','Component have been Found ') ;
    }
    public function found(){
        $isExsist='';
        $list = material::all();
        if($list->contains('materialCode',$this->material))
            $isExsist = 1;
        else
            $isExsist = 0;

           return $isExsist;

    }
    public function save(){
      $dt = Carbon::now()->format('Y-m-d');
        $this->validate([
            'material'=>'required|min:3',
            'threshold'=>'required|numeric|min:1|max:9999',
            'detailed'=>'required',
            'vendor'=>'required'
        ]);
        $mats = material::create([
            'materialCode' => $this->material,
            'materialDetailed'=>$this->detailed,
            'threshold'=>$this->threshold,
            'inventoryId' => $this->invId(),
            'vendorId' => $this->vendor,
            'materialCreate' => $dt,
            'materialUpdate' => $dt,
            'isActive'=>1
        ]);
        inventory::create([
            'inventoryId' => $this->invId(),
            "materialId"=>$mats->materialId,
            'currentQtty'=>0,
            'invCreated'=>$dt,
            'invUpdated'=>$dt
        ]);
        $this->clear();
        session()->flash('message','Component have been Save Sucessfull!!!');

    }
    public function select($id){
        // return dd('hi');
        $this->show =1;
        $this->search1 = $id;
        $list = material::find($id);
        $this->editM = $list->materialCode;
        $this->editV = $list->vendorId;
        $this->select = $list->isActive;
        $this->editT = $list->threshold;
        $this->detailed = $list->materialDetailed;

    }   
    public function found2(){
        $isExsist='';
        $list = material::all();
        if($list->contains('mCode',$this->editM))
            $isExsist = 1;
        else
            $isExsist = 0;

            return $isExsist;

    }
    public function update(){
      $dt = Carbon::now()->format('Y-m-d');

        $list = material::find($this->search1);
        $this->validate([
            'editM'=>'required|min:3',
            'editT'=>'required|numeric|min:1|max:9999',
            'detailed'=>'required',
            'editV'=>'required'
        ]);

        $this->found2()==1 ? $list->materialCode = $this->editM :
        $list->materialCode = $list->materialCode;
        $list->materialDetailed =  $this->detailed;
        $list->vendorId = $this->editV ;
        $list->materialUpdate=$dt;
        $list->isActive = $this->select;
        $list->threshold =  $this->editT;
        $list->update();
        session()->flash('message','Component have been update Sucessfull!!!');
    }
    public function hide(){
        $this->show =0;
    }
    
    public function clear(){
        $this->material='';
        $this->detailed='';        
        $this->select = '';
        $this->threshold ='';
    }
    public function closed(){
        session()->put('failed',null);
        session()->put('message',null);
        session()->put('delete',null);
    }
}
