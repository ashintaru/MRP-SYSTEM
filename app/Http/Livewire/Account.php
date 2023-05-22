<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\account as acs;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Http\Request;


class Account extends Component
{

    public $selectypes,$username,$password,$mName,$lName,$fName,$select,$modal=1,$search2='',$filter1 ="ASC", $filter2 = "5",$filter3='accId';
    use WithPagination;
    
    public $show=0; 
    public $accId='';

    public function save(){
        $this->found()==false? $this->saveAs(): dd('found');
    }
    public function saveAs(){
        $this->validate([
            'username'=>'required|min:8',
            'password'=>'required|min:8',
            'lName'=>'required|min:2|max:30',
            'fName'=>'required|min:2|max:30',
            'mName'=>'required|min:2|max:30',
            'selectypes'=>'required'
        ]);

        $dt = Carbon::now()->format('Y-m-d');

        acs::create([
            'typeId'=>$this->selectypes,
            "accUserName" =>$this->username,
            'accPassWord'=>$this->password,
            'fName'=>$this->fName,
            'mName'=>$this->mName,
            'lName'=>$this->lName,
            'dateCreated'=>$dt,
            'dateUpdated'=>$dt,
            'isActive'=>1
        ]);
        session()->flash('message','Save Succesfully');
        $this->dispatchBrowserEvent('Success');
        $this->modal=0;

    }
    public function found(){
        $boolean=acs::where('accUserName', $this->username)->exists();
        return $boolean;
    }
    public function show1(){
        $this->dispatchBrowserEvent('Roasa');
        $this->modal=1;


    }

    public function render()
    {
        $searchTerm = '%'. $this->search2.'%';
        $data = DB::table('types')->get();
        $result = json_decode($data,true);
        $list = acs::orWhere('accUserName','LIKE',$searchTerm)
                    ->orWhere('fName','LIKE',$searchTerm)
                    ->orWhere('mName','LIKE',$searchTerm)
                    ->orWhere('lName','LIKE',$searchTerm)
                    ->orderBy($this->filter3,$this->filter1)->paginate($this->filter2)
                    ;
        // return dd($result[0]['typeName']);
        if(session('type')=='admin')
        return view('livewire.account',['accounts'=>$list,'index'=> 1,'types'=>$result]);
        else
        return  view('livewire.defender');
    } 

    public function select($id){
        $this->show = 1;
        $this->accId = $id;
        $list = acs::find($id);
        $this->username = $list->accUserName;
        $this->password = $list->accPassWord;
        $this->fName = $list->fName;
        $this->mName = $list->mName;
        $this->lName = $list->lName;
        $this->selectypes = $list->typeId;
        $this->select = $list->isActive;

        // return dd($list);
    }
    public function update(){
        $this->validate([
            'username'=>'required',
            'password'=>'required',
            'lName'=>'required',
            'fName'=>'required',
            'mName'=>'required|',
            'selectypes'=>'required'
        ]);
        $dt = Carbon::now()->format('Y-m-d');   
        $list = acs::find($this->accId);
        $this->found()==false? $list->accUserName = $this->username : $list->accUserName =$list->accUserName;
        $list->accPassWord = $this->password ;
        $list->fName = $this->fName; 
        $list->mName = $this->mName;
        $list->lName = $this->lName;
        $list->typeId = $this->selectypes;
        $list->isActive = $this->select ;
        $list->dateUpdated = $dt;

        $list->update();
        session()->flash('message','Update sucessfully');
    }

    public function hide(){
        $this->show =0;
    }

    public function closed(Request $req){
        $req->session()->put('failed',null);
        $req->session()->put('message',null);
        $req->session()->put('delete',null);
    }

}
