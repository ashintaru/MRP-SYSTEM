<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\models;
use App\Models\status;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
 
class modelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data1 = models::paginate(5);
        return view('model',['models'=>$data1]);
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
        $isActive = 1;
        $input = $request->input();
        $modelInput=$input['modelName'];
        $validator=Validator::make($request->all(), [
            'modelName'=>'required']);
        
        if($validator->fails()){
            return redirect()->back()->withInput();
        }else{
            $modelid = DB::table('model')->max('modelId');
                if($modelid<=0){
                    $modelid = $modelid + 1;
                }
                else{
                    $modelid = $modelid + 1;
                }
            $boolean=models::where('modelName', $modelInput)->exists();
            if($boolean==true){
                return redirect()->back()->withInput();
            }else{
                DB::insert('insert into model 
                (modelId,modelName,modelCreate,modelUpdate,isActive ) 
                values (?,?,?,?,?)', 
                [$modelid,$modelInput,$dt,$dt,$isActive]);
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
        $model = models::findOrFail($id);
        $data1 =json_decode($model,true);
        $status = status::select('statusId','status')
        ->get();
        $data2 =json_decode($status,true);
        // return dd($data1);
        return view('modify-model',['model'=>$data1, 'status'=>$data2]);
    
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
        $model = models::findOrFail($id);
        $dt = Carbon::now()->format('Y-m-d');
        $input = $request->input();
        $modelInput=$input['modelName'];
        $modelStatus = $input['status'];
        $validator = Validator::make($request->all(),[
            'modelName'=>'required'
        ]);
          
        if($validator->fails()){
            return redirect()->back()->withInput();
        }else{
            $boolean=models::where('modelName', $modelInput)->exists();
            if($boolean == true){
                $model->modelName = $model->modelName;
            }else{
                $model->modelName = $modelInput;
            }
            $model->isActive=$modelStatus;
            $model->modelUpdate=$dt;
            $model->update();

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
