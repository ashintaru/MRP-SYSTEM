<?php
 namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\productionList;
use Livewire\WithPagination;
use App\Models\status;
use Carbon\Carbon;
use App\Models\production;
use Illuminate\Http\Request;
use App\Models\models as modelo;
use App\Models\masterList;

use Codedge\Fpdf\Fpdf\Fpdf;

class ProdList extends Component
{
    
    public $emit,$model,$zscore,$month,$search2;
    use WithPagination;
    public $title;
    public $memo;
    public $finalDate;
    public $ids;
    public $status;
    public $selStatus;
    public $select;
    // public $prodList;
    public $i;
    public $show;
    public $hide=0;
    
    
    public function forecast(){
        $this->validate([
            'model'=>'required',
            'zscore'=>'required',
            'month'=>'required'
        ]);
        return redirect()->to('forecast/'.$this->model.'/'.$this->zscore.'/'.$this->month);
    }
    public function Generate(){
        $this->validate([
            'model'=>'required',
            'month'=>'required'
        ]);
        return redirect()->to('prod-report/'.$this->model.'/'.$this->month);
    }
    public function render()
    {
        $search3 = '%'.$this->search2.'%';

        if(session('type')=='user') {
            $prodList1 = productionList::orderBy('idProductionList','DESC')->paginate(12);
            $dt = Carbon::now()->format('Y-m-d');
            foreach ($prodList1 as $key ) {
                if($key->isActive==1){
                    if($key->finalDate < $dt){
                        $key->isActive = 0;
                        $key->update();
                    }
                }
            }
            $prodList = productionList::where('isActive',1)->where('Title','LIKE',$search3)->orderBy('idProductionList','DESC')->paginate(12);

        }
        else{
            $prodList1 = productionList::orderBy('idProductionList','DESC')->paginate(12);
            $dt = Carbon::now()->format('Y-m-d');
            foreach ($prodList1 as $key ) {
                if($key->isActive==1){
                    if($key->finalDate <$dt){
                        $key->isActive= 0;
                        $key->update();
                    }
                }
            }
                $prodList = productionList::where('Title','LIKE',$search3)->orderBy('idProductionList','DESC')->paginate(12);
    
        }
       
           $modelo = modelo::where('isActive',1)->get();
        $masterList = masterList::join('model','modelCode','=','modelId')->where('noComp','>',0)->where('masterlist.isActive',1)->get();
        // return dd($masterList);
        return view('livewire.prod-list',['prodList'=>$prodList,'models'=>$modelo,'masterList'=>$masterList]);
    }
    public function mount(){
        $this->i = 1;
        $this->status = status::select(['statusId','status'])->get();
    }
    public function edit($id){
        
        $list = productionList::where('idProductionList',$id)->first();
        $this->ids = $list->idProductionList;
        $this->title = $list->Title; 
        $this->memo = $list->memo; 
        $this->finalDate = $list->finalDate; 
        $this->select = $list->isActive; 
        $this->show = 1;
        $this->emit('edit');

    }
    public function view($id)
    {
            // return dd($id);
            return redirect()->to('product/'.$id);
    }
    public function update(){
        $dt = Carbon::now()->format('Y-m-d');
        $this->validate([
            'title'=>'required|min:3|max:255',
            'memo'=>'required|min:3|max:255',
            'finalDate'=>'required'
        ]);
        if($this->ids){
            $list = productionList::find($this->ids);
            $list->update([
                'title'=>$this->title,
                'memo'=>$this->memo,
                'finalDate'=>$this->finalDate,
                'dateCreated'=>$dt,
                'dataUpdated'=>$dt,
                'isActive'=>$this->select
            ]);
        }

        session()->flash('message','List have been save Sucessfull!!!');

    }
    public function resetField(){
        $this->ids = '';
        $this->title = '';
        $this->memo = '';
        $this->finalDate = '';
    }

    public function store(){
        $dt = Carbon::now()->format('Y-m-d');

        $this->validate([
            'title'=>'required|min:3|max:255',
            'memo'=>'required|min:3|max:255',
            'finalDate'=>'required'
        ]);
        productionList::create(
            [
                'title'=>$this->title,
                'memo'=>$this->memo,
                'finalDate'=>$this->finalDate,
                'dateCreated'=>$dt,
                'dataUpdated'=>$dt,
                'isActive'=>1
            ]
        );
        session()->flash('message','Save Succesfully');
        $this->emit('added');
        // $this->hide = 1;
        $this->resetField();

    }

    public function cancel(){
        $this->show = 0;
        
    }
    public function closed(Request $req){
        $req->session()->put('failed',null);
        $req->session()->put('message',null);
        $req->session()->put('delete',null);
    }

}
