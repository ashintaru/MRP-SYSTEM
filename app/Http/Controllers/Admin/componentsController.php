<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\masterList;
use Carbon\Carbon;
use App\Models\models;
use App\Models\material;
use App\Models\componets;

use App\Models\status;


class componentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      
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
    public function store(Request $request , $id)
    {
        $dt = Carbon::now()->format('Y-m-d');
        $masterList = masterList::findOrFail($id);
        $listId = $masterList->listId;
        $components = componets::where('listId',$listId)->get();
        $input = $request->input();
        $componentId = uniqid();
        $validator=Validator::make($request->all(), ['material'=>'required','qtty'=>'required']);
        if($validator->fails()){
            return redirect()->back()->withInput();
        }else{
            $code = $input['material'];
            $qtty = $input['qtty'];
            $isExsist='';
            if($components->contains('materialId',$code))
            {
                $isExsist = true;
            }
            else
                $isExsist = false;
            
            if($isExsist == false){
                if($components->contains('componentId',$componentId))
                {
                    $componentId = uniqid();
                }
                else
                    DB::insert('insert into component 
                    (componentId,listId,materialId,fixedQtty,componentsCreated,componentUpdated) 
                    values (?,?,?,?,?,?)', 
                    [$componentId,$listId,$code,$qtty,$dt,$dt]);
            }
        }
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $masterList = masterList::findOrFail($id);
        // $idm = $masterList->modelCode;
        // $models = models::find($idm);
        // // $data = json_decode($masterList,true)
        // return dd($models);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $component = componets::findOrFail($id);
        $data1 = json_decode($component,true);
        $materials = material::select('materialId','materialCode')->get();
        $data2 = json_decode($materials,true);
        // return dd($data1);
        return view('modify-component',['component'=>$data1,'materials'=>$data2]);

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
        $component = componets::findOrFail($id);
        $listId = $component->listId;
        $componentList = componets::where('listId',$listId)->get();
        $data1 = json_decode($componentList,true);
        $input = $request->input();
        $validator=Validator::make($request->all(), ['material'=>'required','qtty'=>'required']);
        $code = $input['material'];
        $qtty = $input['qtty'];
            
            $isExsist='';
            if($componentList->contains('materialId',$code))
            {
                $isExsist = true;
            }
            else
                $isExsist = false;
        
            if($isExsist==true){
                $component->materialId = $component->materialId;
                $component->fixedQtty = $qtty;
                $component->componentUpdated = $dt;
                $request->session()->flash('message','The Data have Update Properly');

                $component->update();
            }else{
                $component->materialId = $code;
                $component->fixedQtty = $qtty;
                $component->componentUpdated = $dt;
                $request->session()->flash('message','The Data have Update Properly');
                $component->update();                
            }
            
        
        // return dd($component);
        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id1 , $id2)
    {   
        $componentList = componets::where('listId',$id1)->get();
        foreach($componentList as $list){
            if($list['componentId'] == $id2){
                $list->delete();
            }
        }
        return redirect()->back();
    }
}
