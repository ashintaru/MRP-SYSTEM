<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\models as modelo;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Http\Request;




class Models extends Component
{
    use WithPagination;
    public $model,$search2='',$filter1 ="ASC", $filter2 = "5";
    public $select;
    public $modelId,$modelC;
    public $show;
    

    public function render()
    {
      
            $searchTerm = '%'. $this->search2.'%';
            $data1 = modelo::orwhere('modelName','LIKE',$searchTerm)->orwhere('mCode','LIKE',$searchTerm)->orderBy('modelName',$this->filter1)->paginate($this->filter2);    
            if(session('type')=='admin')
                return view('livewire.models',['models'=>$data1,'index'=>1]);
            else
                return  view('livewire.defender');
    }
    public function clear(){
        $this->model ='';
        $this->modelC ='';

        $this->modelId = '';

    }

    public function submit(){

        $this->found() !=1 ? $this->save() : $this->error1();
    }
    public function save(){
      $mname = $this->model;
      $dt = Carbon::now()->format('Y-m-d');
      $this->validate([
        'model'=>'required',
        'modelC'=>'required'
      ]);
      modelo::create([
        'mCode'=>$this->modelC,
        'modelName'=>$mname,
        'modelCreate'=>$dt,
        'modelUpdate'=>$dt,
        'isActive'=>1
      ]);
      session()->flash('message','Component have been save Sucessfull!!!');

      $this->clear();
      
    }
    public function error1(){
        $this->emit('havefound');
    }
    public function found(){
        $isExsist='';
        $list = modelo::get();
        if($list->contains('modelName',$this->model)){
            $isExsist = 1;
            session()->flash('notif','Already Exsisted in the list');    
        }
        else
           $isExsist = 0;
        return $isExsist;
    }
    public function select($id){
        $list = modelo::find($id);
        $this->model = $list->modelName;
        $this->select = $list->isActive;
        $this->modelId = $id;
        $this->modelC = $list->mCode;
        $this->show = 1;
    }
    public function update(){
        $list = modelo::find($this->modelId);
      $dt = Carbon::now()->format('Y-m-d');
        $this->validate([
            'model'=>'required',
            'modelC'=>'required'
          ]);
        $this->found() !=1 ? $list->modelName = $this->model : $list->modelName =$list->modelName;
        $list->isActive = $this->select;
        $list->modelUpdate = $dt;
        $list->mCode=  $this->modelC;
        $list->update();
        $this->model = $list->modelName;
        session()->flash('message','Component have been update Sucessfull!!!'); 
          
    }

    public function closed(Request $req){
        $req->session()->put('failed',null);
        $req->session()->put('message',null);
        $req->session()->put('delete',null);
    }
    public function hide(){
        $this->show = 0;
        
    }

}
