<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\material;
use App\Models\orderList;
use App\Models\orders;
use App\Models\inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        //
        $dt = Carbon::now()->format('Y-m-d');
        $List = orderList::findOrFail($id);
        $orders=orders::where('ordListId', $id)->get();
        $input = $request->input();
        $materialCode = $input['material'];
        $qtty = $input['qtty'];
        $validator=Validator::make($request->all(), ['material'=>'required','qtty'=>'required']);
        if($validator->fails()){
            return redirect()->back()->withInput();
        }else{
            $isExsist = 0;
            $isLow = 0;
            if($orders->contains('materialCode',$materialCode)){
                $isExsist = 1;
            }else  
                $isExsist = 0; 
            
            $material = material::where('materialId',$materialCode)->join('origin','origin.vendorId','=','materials.vendorId')->first();
            $lotsize = $material->vendorLotSize;

            if($lotsize < $qtty){
                $isLow = 1;
            }
            else{
                $isLow = 0;
            } 

            if($isExsist == 0 && $isLow == 1){
                $accId = session('accId');              
                $leadtime = $material->vendorLeadTime;
                $leadTimeInt = (int) $leadtime;    
                $dt = Carbon::now()->format('Y-m-d');
                // $newDate = explode('-',$dt);
                // // $month = (int) $newDate[1];
                // $newMonth = $newDate[1] + $leadTimeInt;
                // while($newMonth > 12){
                //     if($newMonth>12){
                //         $newDate[1] = $newMonth - 12;
                //         $newDate[0]++;
                //     }
                //     $newMonth = $newDate[1];
                // }

                // if($newMonth<=12){
                //     $newDate[1] = $newMonth;
                // }
                $formerDate=Carbon::now()->addMonths($leadTimeInt)->format('Y-m-d');
                // echo $dt1->format('Y-m-d') . "\n";
                // $formerDate = Carbon::parse($dt1)->format('Y-m-d');
                // return dd($formerDate);
                $orderId = uniqid();
                $transmited1 = 0;
                $orderStatus = 0;
                DB::insert('insert into orders 
                (orderNo , ordListId , materialCode , orderQtty , orderTrans , orderCreated , orderUpdate , orderDate , accId , orderStatus ) 
                values (?,?,?,?,?,?,?,?,?,?) ', 
                [$orderId,$id,$materialCode,$qtty,$transmited1,$dt,$dt,$formerDate,$accId,$orderStatus] ); 
                $List->orderCount = $List->orderCount + 1;
                $List->update();
                return redirect()->back(); 
            }
            else
                return redirect()->back()->withInput();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = orders::findorFail($id);
        // $listId = $order->ordListId;
        $material = material::select('materialId','materialCode')->where('isActive',1)->get();
        $data2 = json_decode($material,true);
        // return dd($order);
        return view('modify-order',['orders'=>$order,'materials'=>$data2]);
        
    }   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = orders::findorFail($id);
        $dt = Carbon::now()->format('Y-m-d');
        $input = $request->input();
        $materialCode = $input['material'];
        $qtty = $input['qtty'];
        $date = $input['fixDate'];
        $listId = $order->ordListId;
        $listOrder = orders::where('ordListId',$listId)->get();
        // return dd($listOrder);
        $validator=Validator::make($request->all(), ['material'=>'required','qtty'=>'required','fixDate'=>'required']);
        if($validator->fails()){
            return redirect()->back()->withInput();
        }else{
            if($listOrder->contains('materialCode',$materialCode)){
                $order->materialCode = $order->materialCode;
            }else  
                $order->materialCode = $materialCode;
            
            $material = material::where('materialId',$materialCode)->join('origin','origin.vendorId','=','materials.vendorId')->first();
            $lotsize = $material->vendorLotSize;
            if($lotsize > $qtty){
                $order->orderQtty = $order->orderQtty ;
            }
            else{
                $order->orderQtty = $qtty;
            } 

            $order->orderDate = $date;
            $order->orderUpdate = $dt;
            $order->update();
        }
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    } 
    public function aprove($id)
    {
        $order = orders::findOrFail($id);
        $materialId = $order->materialCode;
        $inventory = inventory::where('materialId',$materialId)->first();
        $inventory->currentQtty =  $inventory->currentQtty + $order->orderQtty;
        $order->orderTrans = $order->orderQtty;
        $order->orderQtty = 0;
        $order->orderStatus = 1;
        $order->update();
        $inventory->update(); 
        return redirect()->back();
    }
}
