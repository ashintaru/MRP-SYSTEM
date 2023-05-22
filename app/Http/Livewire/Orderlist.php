<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\orderList as ModelsOrderList;
use Illuminate\Support\Carbon;
use App\Models\material;


class Orderlist extends Component
{   
    use WithPagination;
    public $show,$title,$memo,$fixDate,$orderListid,$select,$materialId,$month,$search2;

    public function clear(){
        $this->title='';
        $this->memo = '';
        $this->fixDate='';
        $this->materialId = '';
        $this->month='';
    }
    public function save(){

        $this->validate([
            'title'=>'required|min:3',
            'memo'=>'required|min:3|max:2000',
            'fixDate'=>'required'
        ]);
        $dt = Carbon::now()->format('Y-m-d');
        ModelsOrderList::create(
            [
                'orderListTitle'=>$this->title,
                'memo'=>$this->memo,
                'datecreated'=>$dt,
                'dateUpdated'=>$dt,
                'fixDate'=>$this->fixDate,
                'isActive'=>1,
                'orderCount'=>0
            ]
            );
      session()->flash('message','List have been save Sucessfull!!!');
      $this->clear();
        
    }
    public function update(){
        $dt = Carbon::now()->format('Y-m-d');
        $list = ModelsOrderList::find($this->orderListid);
        $this->validate([
            'title'=>'required|min:3',
            'memo'=>'required|min:3|max:2000',
            'fixDate'=>'required'
        ]);
        $list->orderListTitle = $this->title;
        $list->memo = $this->memo;
        $list->fixDate = $this->fixDate;
        $list->isActive =  $this->select;
        $list->dateUpdated = $dt;
        $list->update();
        session()->flash('message','List have been update Sucessfull!!!');

    }

    public function edit($id){
        
        $list = ModelsOrderList::find($id);
        $this->orderListid = $list->orderListId ;
        $this->title = $list->orderListTitle;
        $this->memo = $list->memo;
        $this->fixDate = $list->fixDate;
        $this->select = $list->isActive;
        $this->show = 1;
    }
    public function render()
    {
        $list = material::select(['materialId','materialCode'])->get(); 

        $search3 = '%'.$this->search2.'%';

        if(session('type')=='user') {
            $orderList1 = ModelsOrderList::orderBy('orderListId','DESC')->get();
            $dt = Carbon::now()->format('Y-m-d');
            foreach ($orderList1 as $key ) {
                if($key->isActive==1){
                    if($key->fixDate < $dt){
                        $key->isActive = 0;
                        $key->update();
                    }
                }
            }

            $orderList = ModelsOrderList::where('isActive',1)->where('orderListTitle','LIKE',$search3)->orderBy('orderListId','DESC')->paginate(12);
        }
        else{
            $orderList1 = ModelsOrderList::orderBy('orderListId','DESC')->get();
            $dt = Carbon::now()->format('Y-m-d');
            foreach ($orderList1 as $key ) {
                
                if($key->isActive==1){
                    if($key->fixDate < $dt){
                        $key->isActive = 0;
                        $key->update();
                    }
                }
            }

            $orderList = ModelsOrderList::where('orderListTitle','LIKE',$search3)->orderBy('orderListId','DESC')->paginate(12);
         
        }
        // return dd($orderList1);
        return view('livewire.order-list',['masterList'=>$orderList,'models'=>'','i'=>1,'materials'=>$list ]);
    }
    public function hide(){
        $this->show=0;
    }
    
    public function closed(){
        session()->put('failed',null);
        session()->put('message',null);
        session()->put('delete',null);
    }

    public function viewRepor(){
        $this->validate([
            'materialId'=>'required',
            'month'=>'required'
        ]);
        return redirect()->to('order-report/'.$this->materialId.'/'.$this->month);
    }
}
