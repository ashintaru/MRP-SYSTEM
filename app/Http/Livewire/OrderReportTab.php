<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\material;
use App\Models\orders;
use Illuminate\Support\Carbon;
class OrderReportTab extends Component
{
    
    public $material,$months,$sendMat,$sendMot;

    public function mount($material,$month){
        $this->material=$material;
        $this->months=$month;
    }
    public function render()
    {

        if(is_numeric($this->material)==false)
            $this->material=0;

        if(is_numeric($this->months)==false)
            $this->months=3;


        $dt = Carbon::now()->format('Y-m-d');
        $newDate = Carbon::now()->subMonth($this->months)->format('Y-m-d');
        if($this->material==0){
            $title = 'Oders From'. ' '.Carbon::parse($newDate)->format('F d Y').' - '.Carbon::parse($dt)->format('F d Y');
            $orders = orders::join('materials','materials.materialId','=','orders.materialCode')->join('orderlist','orderlist.orderListId','=','orders.ordListId')->whereBetween('orderUpdate',[$newDate,$dt])->orderby('orderCreated','ASC')->get();
            $data1 = json_decode($orders,true);
            $array = array();
            foreach($data1 as $key){
                $createdAt = Carbon::parse($key['orderCreated']);
                $key['orderCreated'] = $createdAt->format('F d Y');
                $recieveAt = Carbon::parse($key['orderDate']);
                $key['orderDate'] = $recieveAt->format('F d Y');
                array_push($array,$key);
            }
        }else{
            $title = 'Oders From'. ' '.Carbon::parse($newDate)->format('F d Y').' - '.Carbon::parse($dt)->format('F d Y');
            $orders = orders::where(['orders.materialCode'=>$this->material])->join('materials','materials.materialId','=','orders.materialCode')->join('orderlist','orderlist.orderListId','=','orders.ordListId')->whereBetween('orderUpdate',[$newDate,$dt])->orderby('orderCreated','ASC')->get();
            $data1 = json_decode($orders,true);
            $array = array();
            foreach($data1 as $key){
                $createdAt = Carbon::parse($key['orderCreated']);
                $key['orderCreated'] = $createdAt->format('F d Y');
                $recieveAt = Carbon::parse($key['orderDate']);
                $key['orderDate'] = $recieveAt->format('F d Y');
                array_push($array,$key);
            }
        }
        
        // return dd($array);
        if(session()->has('accId'))
            return view('livewire.order-report-tab',[ 'materials'=>$array,'title'=>$title]);
        else
            return  view('livewire.defender');
    }

    public function submit(){
        $this->sendMat = $this->material;
        $this->sendMat = $this->months;
    }
    public function open(){
        return redirect('pdf'.'/'.$this->material.'/'.$this->months);
    }
}
