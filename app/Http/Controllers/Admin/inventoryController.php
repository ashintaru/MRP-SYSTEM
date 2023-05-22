<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\inventory;
use App\Models\material;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class inventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory = inventory::join('materials','materials.materialId','=','inventory.materialId')->orderBy('currentQtty','ASC')->paginate(9);
        // return dd($inventory);
        $i=0;
        return view('inventory',['list'=>$inventory,'index'=>$i]);
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
    public function store(Request $request)
    {
        //
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
    public function edit1($id)
    {   
        // $inventory1 = inventory::join('materials','materials.materialId','=','inventory.materialId')->get();
        $invenotry = inventory::findOrFail($id);
        $materials = material::findOrFail($invenotry->materialId);
        $materialsList = material::select('materialId','materialCode')->get();
        $data1 =json_decode($invenotry,true);
        $data2 =json_decode($materials,true);
        $data3 = json_decode($materialsList,true);
        // return dd($data3);
        return view('modify-inventory',['data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
    }
    public function edit2($id)
    {   
        // $inventory1 = inventory::join('materials','materials.materialId','=','inventory.materialId')->get();
        $invenotry = inventory::findOrFail($id);
        $materials = material::findOrFail($invenotry->materialId);
        $materialsList = material::select('materialId','materialCode')->get();
        $data1 =json_decode($invenotry,true);
        $data2 =json_decode($materials,true);
        $data3 = json_decode($materialsList,true);
        // return dd($data3);
        return view('add-inventory',['data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
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
        $dt = Carbon::now()->format('Y-m-d');
        $invenotry = inventory::findOrFail($id);
        $materials = material::findOrFail($invenotry->materialId);
        $input = $request->input();
        $validator=Validator::make($request->all(), ['qtty'=>'required']);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            $invenotry->currentQtty = $input['qtty'];
            $invenotry->invUpdated = $dt;
            $invenotry->update();
        }      
        return redirect()->back(); 

        // return dd($invenotry);
    }   
    public function add(Request $request, $id)
    {
        $dt = Carbon::now()->format('Y-m-d');
        $invenotry = inventory::findOrFail($id);
        $materials = material::findOrFail($invenotry->materialId);
        $input = $request->input();
        $validator=Validator::make($request->all(), ['qtty'=>'required']);
        
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            $qttyInt = (int)$input['qtty'];
            if($qttyInt==0){
                $invenotry->currentQtty = $invenotry->currentQtty;    
                $invenotry->update();
            }else{
                $final = $qttyInt + $invenotry->currentQtty;
                $invenotry->currentQtty = $final;
                $invenotry->invUpdated = $dt;
                $invenotry->update();
            }

        }      
        return redirect()->back(); 

        // return dd($invenotry);
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
}
