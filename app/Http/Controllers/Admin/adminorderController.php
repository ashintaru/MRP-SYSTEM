<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\orderList;
use App\Models\orders;
use App\Models\material;
use App\Models\inventory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class adminorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // //checking the date
        // $orderLists = orderList::get();
        // $data1 = json_decode($orderLists,true);
        // foreach($data1 as $list){
        //     $dt = Carbon::now()->format('Y-m-d');
           

        // }
        // // return dd($data1);
        $orderList = DB::table('orderlist')->orderBy('orderListId','DESC')->paginate(12);
        // $data1 = json_decode( $orderList,true);
        // return dd($orderList);
        return view('orderList',['masterList'=>$orderList,'models'=>'','i'=>1]);
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
    public function store(Request $request)
    {
        $dt = Carbon::now()->format('Y-m-d');
        $input = $request->input();
        $title = $input['title']; 
        $memo = $input['memo'];
        $date = $input['fixDate'];
        $newDate = date('Y-m-d',strtotime($date));
        $isActive ='';
        $validator=Validator::make($request->all(), [
            'title'=>'required','memo'=>'required','fixDate'=>'required']);
        if($validator->fails()){
            return redirect()->back()->withInput();
        }else{
            $orderListId = orderList::max('orderListId');
           
            if($orderListId<=0){
                $orderListId = $orderListId + 1;
            }
            else{
                $orderListId = $orderListId + 1;
            }

            if($newDate < $dt){
                $isActive = 0;
            }else{
                $isActive =1;
            }
            $orderCount = 0;

            DB::insert('insert into orderlist 
                (orderListId,orderListTitle,memo,datecreated,dateUpdated,fixDate,isActive,orderCount) 
                values (?,?,?,?,?,?,?,?)', 
                [$orderListId,$title,$memo,$dt,$dt,$newDate,$isActive,$orderCount]);      
        }
        // $str = str_shuffle($memo);
        // return dd($str);
        return redirect()->back();
        // return $request->all();
        // return $orderListId;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //transmiting quantity 
        $List = orderList::findOrFail($id);
        $data1 = json_decode($List,true);
        // return dd($data1);
        $idm = $List->orderListId;
        $orderList = orders::where('ordListId',$id)->join('materials','materials.materialId','=','orders.materialCode')->join('origin','materials.vendorId','=','origin.vendorId')->join('person','person.accId','=','orders.accId')->orderBy('orders.orderCreated','DESC')->get();
        $data2 = json_decode($orderList,true);
        $material = material::select('materialId','materialCode')->where('isActive',1)->get();
        $data3 = json_decode($material,true);
        $dt = Carbon::now()->format('Y-m-d');
        foreach ($orderList as $key ) {
            if($key->orderStatus==0){
                if($key->orderDate<$dt){
                    $key->orderStatus=1;
                    $invId = $key->inventoryId; 
                    $inventory = inventory::where('materialId',$invId)->first();
                    // return dd($inventory);                    
                    $key->orderTrans = $key->orderQtty;
                    $inventory->currentQtty = $inventory->currentQtty + $key->orderQtty;
                    $key->orderQtty = 0;
                    $inventory->update();
                    $key->update();
                }
            }
        }

        // return dd($List);
        $pagOrderList = orders::where('ordListId',$id)->join('materials','materials.materialId','=','orders.materialCode')->join('origin','materials.vendorId','=','origin.vendorId')->join('person','person.accId','=','orders.accId')->orderBy('orders.orderDate','asc')->paginate(5);
        $orders = orders::where('ordListId',$id)->join('materials','materials.materialId','=','orders.materialCode')->get();
        $data2 = json_decode($pagOrderList,true);
        return view('orders',['order'=>$data1,'lists'=>$pagOrderList,'materials'=>$data3,'index'=>1,'data4'=>$orders]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderList = orderList::findOrFail($id);
        $data1 = json_decode($orderList,true);
        // return dd($data1);
        return view('modifyOrderList',['list'=>$data1]);


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
        $orderList = orderList::findOrFail($id);
        $dt = Carbon::now()->format('Y-m-d');
        $input = $request->input();
        $title = $input['title']; 
        $memo = $input['memo'];
        $date = $input['fixDate'];
        $newDate = date('Y-m-d',strtotime($date));
        // return $request->all();
        $validator=Validator::make($request->all(), [
            'title'=>'required','memo'=>'required','fixDate'=>'required']);
        if($validator->fails()){
            return redirect()->back();
        }else{
            $orderList->orderListTitle=$title;
            $orderList->memo=$memo;
            $orderList->dateUpdated=$dt;
            $orderList->fixDate=$newDate;
            $orderList->update();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderList = orderList::findOrFail($id);
        $orderList->delete();
        return redirect()->back();
    }
    public function closed($id)
    {
        $orderList = orderList::findOrFail($id);
        $orderList->isActive = 0;
        $orderList->update();
        return redirect()->back();
    }
    public function open($id)
    {
        $orderList = orderList::findOrFail($id);
        $orderList->isActive = 1;
        $orderList->update();
        return redirect()->back();
    }
}
