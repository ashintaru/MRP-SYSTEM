<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\masterList;
use Livewire\WithPagination;
use Carbon\Carbon;

use App\Models\models;
use App\Models\componets;
use App\Models\material;


class Components extends Component
{
    use WithPagination;
    public $show;
    public $masterlistId;
    public $componentsId;
    public $material;
    public $quantity;
    public $term = "",$action;

    public function mount($id){
        $this->masterlistId = $id;
    }
    public function failed(){
        session()->flash('failed','Created Failed!!!');
    }
    public function found(){
        $isExsist='';
        $list = componets::where('listId',$this->masterlistId)->get();
        if($list->contains('materialId',$this->material)){
            $isExsist = 1;
            session()->flash('notif','Already Exsisted in the list');    
        }
        else
           $isExsist = 0;
        return $isExsist;
    }
    public function saveAs(){
        $dt = Carbon::now()->format('Y-m-d');
        componets::create([
            'listId'=>$this->masterlistId,
            'materialId'=>$this->material,
            'fixedQtty'=>1,
            'componentsCreated'=>$dt,
            'componentUpdated'=>$dt
        ]);

        $masterList = masterList::findorFail( $this->masterlistId);
        $masterList->noComp = $masterList->noComp + 1;
        $masterList->update();


        session()->flash('message','Component have been save Sucessfull!!!');
    }
    public function save(){
        $this->validate([
            'material'=>'required'
        ]);
        $this->found() != 1 ? $this->saveAs() : $this->failed();
    }
    public function select($id){
        $this->show =1 ;   
        $this->action='edit';
        $this->componentsId = $id;
        $components = componets::find($this->componentsId);
        $this->material = $components->materialId;
        $this->quantity =$components->fixedQtty;
    }
    public function select2($id){
        $this->show =1 ;   
        $this->action='delete';
        $this->componentsId = $id;
        $components = componets::find($this->componentsId);
        $this->material = $components->materialId;
        $this->quantity =$components->fixedQtty;
    }
    public function closed(Request $req){
        $req->session()->put('failed',null);
        $req->session()->put('message',null);
        $req->session()->put('delete',null);
    }
    public function update(){
        $this->validate([
            'material'=>'required',
            'quantity'=>'required|min:1|max:9999'
        ]);
        $components = componets::find($this->componentsId);
        $this->found() == 1 ?  $components->materialId = $components->materialId  : $components->materialId = $this->material;
        $components->fixedQtty = $this->quantity;
        $components->update();
        $this->material = $components->materialId;
        session()->flash('message','Component have been update Sucessfull!!!');
    }
    public function delete(){
        componets::where('componentId',$this->componentsId)->delete();
        $this->componentsId = "";
        session()->flash('delete','Component have been delete Sucessfull!!!');
        $masterlist = masterList::find($this->masterlistId);
        $masterlist->noComp = $masterlist->noComp - 1 ; 
        $masterlist->update();
    }
    public function render()
    {
        
        $masterList = masterList::findOrFail($this->masterlistId);
        $idm = $masterList->modelCode;
        $models = models::find($idm);
        $data2 = json_decode($models,true);
        $components = componets::where('listId',$this->masterlistId)->join('materials','materials.materialId','=','component.materialId')->orderBy('componentId','DESC')->get();
        $data1 = json_decode($components,true);
        $material = material::select('materialId','materialCode')->where('isActive',1)->get();
        $data3 = json_decode($material,true);
        $data = json_decode($masterList,true);

        if(session('type')=='admin')
            return view('livewire.components',['list'=>$data,'model'=>$data2,'components'=>$data1,'materials'=>$data3,'index'=>1 ]);
        else
            return  view('livewire.defender');
    }
    public function clear(){
        $this->componentsId = '';
        $this->material = '';
        $this->quantity = '';
    }
    public function cancel(){
        $this->show=0;
        $this->material = '';
        $this->quantity ='';
    }
}
