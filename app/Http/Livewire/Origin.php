<?php

namespace App\Http\Livewire;

use App\Models\material;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\vendor;
use Carbon\Carbon;  

class Origin extends Component
{
    public $vendorName,$search2='',$filter1 ="ASC", $filter2 = "5",$mot;
    public $lotSize;
    public $leadTime;
    public $vendorCode;
    public $select;
    public $array = array();
    public $message;
    private $vendors;
    use WithPagination;
    public $show;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function found(){
        $isExsist='';
        $vendor = vendor::get();
        if($vendor->contains('vendorName',$this->vendorName))
            $isExsist = 1;
        else
            $isExsist = 0;
       return $isExsist;
    }
    public function submit(){
        $this->found() != 1 ? $this->save() : $this->failed();
    }
    public function save(){ 
        $dt = Carbon::now()->format('Y-m-d');
         $this->validate([
            'vendorName'=>'required',
            'lotSize'=>'required|numeric|min:1|max:9999',
            'mot'=>'required',
            'leadTime'=>'required|numeric|min:1|max:12' 
        ]);
        // return dd($validate);

        vendor::create([
            'vendorName' => $this->vendorName,
            'vendorLotSize'=> $this->lotSize,
            'vendorLeadTime' => $this->leadTime,
            'MOT'=>$this->mot,
            'vendorCreated' => $dt,
            'vendorUpdate'=> $dt,
            'vendorStatus' => 1
        ]);
        session()->flash('message','Component have been save Sucessfull!!!');
        $this->reset1();
    }
    public function failed(){
        session()->flash('failed','Created Failed!!!');
    }
    public function closed(Request $req){
        $req->session()->put('failed',null);
        $req->session()->put('message',null);
        $req->session()->put('delete',null);
    }
    public function select($id){
        $this->vendorCode = $id;
        $list = vendor::find($id);
        $this->vendorName = $list->vendorName;
        $this->lotSize = $list->vendorLotSize;
        $this->leadTime = $list->vendorLeadTime; 
        $this->select = $list->vendorStatus;
        $this->mot = $list->MOT;
        $this->show = 1;
        $this->array = material::where('vendorId',$this->vendorCode)->select('materialCode')->get();
    }
    public function select2($id){
        $list = vendor::find($id);
        $this->vendorName = $list->vendorName;
        $this->lotSize = $list->vendorLotSize;
        $this->leadTime = $list->vendorLeadTime; 
        $this->select = $list->vendorStatus;
        $this->show = 1;
        $this->array = material::where('vendorId',$this->vendorCode)->select('materialCode')->get();
    }
    public function edit($id){
        $list = vendor::where('vendorId',$id)->first();
        $this->vendorName = $list->vendorName;
        $this->lotSize = $list->vendorLotSize;
        $this->leadTime = $list->vendorLeadTime; 
        $this->select = $list->vendorStatus;
        $this->array = material::where('vendorId',$id)->select('materialCode')->get();
    }
    public function update(){
        $dt = Carbon::now()->format('Y-m-d');
        $list = vendor::find($this->vendorCode);
        $this->validate([
            'vendorName'=>'required',
            'lotSize'=>'required|numeric|min:1|max:9999',
            'mot'=>'required',
            'leadTime'=>'required|numeric|min:1|max:12' 
            
        ]);
        $this->found() != 1 ? $list->vendorName = $this->vendorName : $list->vendorName = $list->vendorName;
        $list->vendorLotSize = $this->lotSize;
        $list->vendorLeadTime = $this->leadTime;
        $list->vendorUpdate = $dt;
        $list->vendorStatus = $this->select;
        $list->MOT = $this->mot;
        $list->update();
        session()->flash('message','Component have been save Sucessfull!!!');
    }
    public function reset1(){
        $this->vendorCode = '';
        $this->vendorName = '';
        $this->lotSize = '';
        $this->leadTime = ''; 
        $this->select = '';
        $this->mot = '';

    }
    
    public function render()
    {
        // sleep(1);
        // $this->emit('refreshComponent');
        $index = 1;

        $searchTerm = '%'. $this->search2.'%';
        $vendors = vendor::where('vendorName','LIKE',$searchTerm)->orderBy('vendorName',$this->filter1)->paginate($this->filter2);
        if(session('type')=='admin')
            return view('livewire.origin',['vendors'=>$vendors,'index'=>$index]);
        else
            return  view('livewire.defender');
    }
    public function cancel(){
        $this->show=0;
    }

}
