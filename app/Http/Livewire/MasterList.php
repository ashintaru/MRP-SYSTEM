<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\models;
use App\Models\masterList as mlist;
use Livewire\WithPagination;
use Carbon\Carbon;
use App\Models\status;
use App\Models\material;
use App\Models\componets;


class MasterList extends Component
{

    
    use WithPagination;
    public $mname;
    public $selectModel;
    public $select;
    public $ids;
    public $components = array();
    public $show;

    public function render()
    {
        $status = status::get();
        $data = models::where('isActive', 1)
        ->select('modelId','modelName','mCode')
        ->get();
        $models=json_decode($data,true);
        $data2 = mlist::join('model','model.modelId','=','masterlist.modelCode')->join('status','status.statusId','=','masterlist.isActive')->orderBy('listId','DESC')->paginate(6); 
     
        if(session('type')=='admin')
            return view('livewire.master-list',['models'=>$models,'masterList'=>$data2,'status'=>$status ]);
        else
            return  view('livewire.defender');
        // return dd($data2);
    }
    public function clear(){
        $this->selectModel='';
    }
    public function check($id){
        $isExsist = "";
        $list = mlist::get();
        if($list->contains('modelCode',$id))
             $isExsist = 1;
            else
            $isExsist = 0;
                return $isExsist;
    }
    public function save(){
        $id = $this->selectModel;
        $validateData = $this->validate([
            'selectModel'=>'required'
        ]);
        $this->check($this->selectModel) != 1 ? $this->saveAs($id) : $this->failed();
    }
    public function failed(){
        session()->flash('failed','Created Failed!!!');
    }
    public function edit($id){
        $list = mlist::find($id);
        $this->ids = $id;
        $this->selectModel = $list->modelCode;
        $this->select = $list->isActive;
        $this->show=1;
    }
    public function saveEdit(){
        $dt = Carbon::now()->format('Y-m-d');
        $list = mlist::find($this->ids);
        $validateData = $this->validate([
            'selectModel'=>'required'
        ]);
        $this->check($this->selectModel) == 1 ? $list->modelCode = $list->modelCode : $list->modelCode = $this->selectModel;
        $list->isActive = $this->select;
        $list->listUpdated = $dt;
        $list->update();
        $this->selectModel = $list->modelCode;
        $this->show=0;
        session()->flash('message','Updating Succesfully');
    }
    public function saveAs($id){
        $dt = Carbon::now()->format('Y-m-d');
        mlist::create([
            'modelCode'=> $id,
            'listCreated'=>$dt,
            'listUpdated'=>$dt,
            'isActive'=>1,
            'noComp'=>0
        ]);
        session()->flash('message','Created Succesfully');
    }
    public function view($id){
        $list = mlist::find($id);
        $model = models::where('modelId',$list->modelCode)->first();
        $this->mname = $model->modelName;
        $this->components = componets::where('listId',$id)->join('materials','materials.materialId','=','component.materialId')
        ->select(['materialCode','fixedQtty'])->get();
        // return dd(  $this->components);
    }
    public function closed(Request $req){
        $req->session()->put('failed',null);
        $req->session()->put('message',null);

    }

    public function cancel(){
        $this->show=0;
    }
}

