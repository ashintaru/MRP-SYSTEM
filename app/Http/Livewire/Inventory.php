<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;

use Livewire\Component;
use App\Models\inventory as ibentory;
USE App\Models\invLogs;
use Livewire\WithPagination;
use App\Models\material;
use Carbon\Carbon;




class Inventory extends Component
{
    use WithPagination;
    public $modelName;
    public $date;
    public $prevQ;
    public $newQuantity;
    public $invIds,$show,$action,$search2,$filter1 ="ASC", $filter2 = "5",$filter3='currentQtty';

    protected $rules = [
        'newQuantity' => 'required|numeric|min:1',
    ];



    public function render()
    {
        $search3 = '%'.$this->search2.'%';
        $inventory = ibentory::join('materials','materials.materialId','=','inventory.materialId')
        ->where('materialCode','LIKE',$search3)->orderBy($this->filter3,$this->filter1)->paginate($this->filter2);
        // return dd($inventory);
        $i=1;
        // return dd($inventory);
            if(session()->has('type'))
            return view('livewire.inventory',['list'=>$inventory,'index'=>$i]);
            else
                return view('livewire.index');
        }
    public function modify(){
        $this->validate([
            'newQuantity'=>'required'
        ]);
        $dt = Carbon::now()->format('Y-m-d');
        $inventory1 = ibentory::find($this->invIds);
        $dataModify = $inventory1->currentQtty . ' '.'have been modify into'.' '. $this->newQuantity;
        $inventory1->currentQtty = $this->newQuantity;
        $inventory1->invUpdated = $dt;
        $inventory1->update();
        $this->prevQ = $inventory1->currentQtty;
        $action = 1;        
        $logID = 'invLog#'.uniqid();
        invLogs::create([
            'logId'=>$logID,
            'materialId'=>$inventory1->materialId,
            'action'=>$action,
            'value'=>$this->newQuantity,
            'remark'=>$dataModify,
            'date'=>$dt

        ]);
        $this->newQuantity = '';
        session()->flash('message','Modify Succesfully');
    }
    public function select($id){
        $inventory1 = ibentory::find($id);
        $selectMats = material::where('materialId',$inventory1->materialId)->first();
        $this->modelName = $selectMats->materialCode;
        $this->date = $inventory1->invUpdated;
        $this->prevQ = $inventory1->currentQtty;
        $this->invIds = $id;
        $this->newQ = '';
        $this->show = 1;
        $this->action = 'add';
        // return dd($inventory1);
    }
    public function select1($id){
        $inventory1 = ibentory::find($id);
        $selectMats = material::where('materialId',$inventory1->materialId)->first();
        $this->modelName = $selectMats->materialCode;
        $this->date = $inventory1->invUpdated;
        $this->prevQ = $inventory1->currentQtty;
        $this->invIds = $id;
        $this->newQ = '';
        $this->show = 1;
        $this->action = 'modify';
        // return dd($inventory1);
    }
    public function add(){
        $this->validate([
            'newQuantity'=>'required|numeric|min:1'
        ]);
        $dt = Carbon::now()->format('Y-m-d');
        $inventory1 = ibentory::find($this->invIds);
        $oldQuantity = $inventory1->currentQtty;
        $inventory1->currentQtty = $inventory1->currentQtty + $this->newQuantity;
        $inventory1->invUpdated = $dt;
        $inventory1->update();
       
        $action = 0;        
        $logID = 'invLog#'.uniqid();


        $data =  $oldQuantity .' ' .'have been add'. ' '. $this->newQuantity . ' ' .'the result is '.' '.$inventory1->currentQtty;
        invLogs::create([
            'logId'=>$logID,
            'materialId'=>$inventory1->materialId,
            'action'=>$action,
            'value'=>$this->newQuantity,
            'remark'=>$data,
            'date'=>$dt

        ]);

        $this->prevQ = $inventory1->currentQtty;
        $this->newQuantity = '';
        $this->show = 0;
        session()->flash('message','Adding Succesfully');
        // $this->emit('modify');
    }
    public function hide(){
        $this->show = '';
        $this->action = '';
    }
    public function closed(Request $req){
        $req->session()->put('failed',null);
        $req->session()->put('message',null);
        $req->session()->put('delete',null);
    }
}
