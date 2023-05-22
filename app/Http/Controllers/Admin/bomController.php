<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\models;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\masterList;
use App\Models\componets;
use Illuminate\Support\Facades\DB;
use App\Models\status;
use App\Models\material;
use Illuminate\View\Component;

class bomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = models::where('isActive', 1)
        ->select('modelId','modelName')
        ->get();
        $models=json_decode($data,true);
        $data2 = masterList::join('model','model.modelId','=','masterlist.modelCode')->join('status','status.statusId','=','masterlist.isActive')->paginate(10); 
        // return dd($data2);        
        if(session('accId')===null && session('type')!='admin'){
            return redirect()->back();
        }else{
            return view('Bom',['models'=>$models,'masterList'=>$data2]);
        }
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
        $isActive = 1;
     
        $validator = Validator::make($request->all(),['models'=>'required']);
        $modelInput = $input['models'];


        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            $masterListId = DB::table('masterlist')->max('listId');
            if($masterListId<=0){
                $masterListId = $masterListId + 1;
            }
            else{
                $masterListId = $masterListId + 1;
            }
            $boolean=masterList::where('modelCode', $modelInput)->exists();
            if( $boolean == true){
                return redirect()->back()->withInput();
            }else{
                //saving data to database
                DB::insert('insert into masterlist 
                (listId,modelCode,listCreated,listUpdated,isActive) 
                values (?,?,?,?,?)', 
                [$masterListId,$modelInput,$dt,$dt,$isActive]);
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
        $masterList = masterList::findOrFail($id);
        $idm = $masterList->modelCode;
        $models = models::find($idm);
        $data2 = json_decode($models,true);
        $components = componets::where('listId',$id)->join('materials','materials.materialId','=','component.materialId')->get();
        $data1 = json_decode($components,true);
        $material = material::select('materialId','materialCode')->where('isActive',1)->get();
        $data3 = json_decode($material,true);
        $data = json_decode($masterList,true);
        // return dd($data1);
        return view('components',['list'=>$data,'model'=>$data2,'components'=>$data1,'materials'=>$data3 ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $masterList = masterList::findOrFail($id);
        $data1 = json_decode($masterList,true);
        $status = status::select('statusId','status')
        ->get();
        $data2 = json_decode($status,true);
        $model = models::select('modelId','modelName')
        ->get();
        $data3 = json_decode($model,true);
        return view('modify-master-list',['list'=>$data1,'status'=>$data2,'models'=>$data3]);
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
        $masterList = masterList::findOrFail($id);
        $dt = Carbon::now()->format('Y-m-d');
        $input = $request->input();
        $modelInput = $input['modelCode'];
        $statusInput = $input['status'];
        $validator=Validator::make($request->all(), ['modelCode'=>'required','status'=>'required']);
        if($validator->fails()){
            $request->session()->flash('err_message','The Data have not Update Properly'); 
            return redirect()->back()->withInput();
        }else{
            $modelName=masterList::where('modelCode',$modelInput)->exists();
            if($modelName==true){
                $masterList->modelCode=$masterList->modelCode;
            }else{
                $masterList->modelCode=$modelInput;
            }

            $masterList->listUpdated=$dt;
            $masterList->isActive=$statusInput;
            $masterList->update();
            $request->session()->flash('message','The Data have Update Properly');
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
