<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vendor;
use App\Models\material;
use App\Models\inventory;
use App\Models\status;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\matches;

class materialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data1 = material::join('origin','origin.vendorId','=','materials.vendorId')->paginate(10);
        $data = vendor::where('vendorStatus', 1)
         ->select('vendorId','vendorName')
         ->get();
        // $data = vendor::all();
        $vendor = json_decode($data,true);
        // $material = json_decode($data1,true
        // // }if($materialid==0){
        // //    $materialid = $materialid+1;
        // // }


        // return dd($materialid);
        if(session('type')!='admin'){
            return redirect()->back();
        }else{
            return view('material',['vendors'=>$vendor,'materials'=>$data1]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $isActive = 1;
        $input = $request->input();
        $validator=Validator::make($request->all(), [
            'materialCode'=>'required']);
    
            if ($validator->fails()){
                return redirect()->back()->withInput()->withErrors($validator);
            }else{
                $materialid = DB::table('materials')->max('materialId');
                if($materialid<=0){
                    $materialid = $materialid + 1;
                }
                else{
                    $materialid = $materialid + 1;
                }
                $inventoryid = DB::table('inventory')->max('inventoryId');
                if($inventoryid<=0){
                    $inventoryid = $inventoryid + 1;
                }
                else{
                    $inventoryid = $inventoryid + 1;
                }
                $currentQtty=0;
                $materialCode = $input['materialCode'];
                $vendorCode = $input['vendor'];
                $boolean=material::where('materialCode', $materialCode)->exists();
                if($boolean==true){
                    return redirect()->back()->withInput();
                }else{
                    DB::insert('insert into materials 
                    (materialId,materialCode,inventoryId,vendorId,materialCreate,materialUpdate,isActive ) 
                    values (?,?,?,?,?,?,?)', 
                    [$materialid,$materialCode,$inventoryid,$vendorCode,$dt,$dt,$isActive]);
                    DB::insert('insert into inventory 
                    (inventoryId,materialId,currentQtty,invCreated,invUpdated) 
                    values (?,?,?,?,?)', 
                    [$inventoryid,$materialid,$currentQtty,$dt,$dt]);
                    
                    return redirect()->back();     

                }

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
        $vendor = vendor::where('vendorStatus', 1)
        ->select('vendorId','vendorName')
        ->get();
        $data1 =json_decode($vendor,true);
        $status = status::select('statusId','status')
        ->get();
        $data2 =json_decode($status,true);
        $material = material::findOrFail($id);
        $data3 =json_decode($material,true);
        // return dd($data2);
        return view('modify-material',['vendors'=>$data1, 'status'=>$data2, 'materials'=>$data3]);
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
        $material = material::findOrFail($id);        
        $dt = Carbon::now()->format('Y-m-d');
        $input = $request->input();
        $materialInput=$input['materialName'];
        $vendorInput=$input['vendor'];
        $statusInput=$input['status'];
        $validator=Validator::make($request->all(), ['materialName'=>'required']);
        if($validator->fails()){
            return redirect()->back()->withInput();
        }else{
            $materialName=material::where('materialCode',$materialInput)->exists();
            if($materialName==true){
                $material->materialCode=$material->materialCode;
            }else{
                $material->materialCode=$materialInput;
            }
            $material->vendorId=$vendorInput;
            $material->isActive=$statusInput;
            $material->materialUpdate=$dt;
            $material->update();
            return redirect()->back();
        }
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
