<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\vendor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\status;


class vendorControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   
        $vendor = vendor::paginate(5);
        // return dd($vendor);
        // $data =json_decode($vendor,true);
        // return dd($data);
        // return dd($id);
        if(session('type')!='admin'){
            return redirect()->back();
        }else{
            return view('origin',['vendors'=>$vendor]);
            
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
        $vendorid = Str::uuid()->toString();
        $id = DB::table('origin')->max('vendorId');
        $newid = $id+1; 
        $isActive = 1;
        $validator=Validator::make($request->all(), [
            'vendorName'=>'required|min:2',
            'lotSize'=>'required',
            'leadTime'=>'required']);
            $vendor=$input['vendorName']; $lotSize=$input['lotSize'];$leadTime=$input['leadTime'];
            if ($validator->fails()){
                return redirect()->back()->withInput()->withErrors($validator);
            }else{
                // $boolean=vendor::where('accUserName', $vendor)->exists();
                $vendorName=vendor::where('vendorName',$vendor)->exists();
                if ($vendorName == true) {
                    return redirect()->back()->withInput();
                }else{
                    DB::insert('insert into origin 
                    (vendorId,vendorName,vendorLotSize,vendorLeadTime,vendorCreated,vendorUpdate,vendorStatus) 
                    values (?,?,?,?,?,?,?)', 
                    [$newid,$vendor,$lotSize,$leadTime,$dt,$dt,$isActive]);
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
        $student = vendor::find($id);
        // $student = vendor::find($id);
        return dd($student);
        // if (Hash::check('vendor1', $id)) {
        //     echo 'true';
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $dt = Carbon::now()->format('Y-m-d');
        // $newDate = explode('-',$dt);
        
        // $month = (int) $newDate[1];

        // $newMonth = $newDate[1]+12;
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
        // $dt1 = Carbon::create($newDate[0], $newDate[1], $newDate[2], 0, 0, 0);
        // // echo $dt1->format('Y-m-d') . "\n";
        // $formerDate = Carbon::parse($dt1)->format('Y-m-d');
        // return dd($formerDate);

        $vendor = vendor::find($id);
        $vendorData = json_decode($vendor,true);
        $status = status::all();
        $statusData = json_decode($status,true);
        return view('modify-vendor-form',['vendors'=>$vendorData,'status'=>$statusData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $key1)
    {
        $dt = Carbon::now()->format('Y-m-d');
       
        $input = $request->input();
        $validator=Validator::make($request->all(), [
            'vendorName'=>'required|min:2',
            'lotSize'=>'required',
            'leadTime'=>'required']);
            $vendorInput=$input['vendorName']; 
            if ($validator->fails()){
                return redirect()->back()->withInput()->withErrors($validator);
            }else{
                // $boolean=vendor::where('accUserName', $vendor)->exists();
                $vendor = vendor::find($key1);
                $vendor->vendorLotSize=$request->input('lotSize');
                $vendor->vendorLeadTime=$request->input('leadTime');
                $vendor->vendorStatus=$request->input('status');
                $vendor->vendorUpdate=$dt;        
                $vendorName=vendor::where('vendorName',$vendorInput)->exists();
                if ($vendorName==true) {
                    $vendor->vendorName=$vendor->vendorName;
                }else{
                    $vendor->vendorName=$request->input('vendorName');
                }
                
                $vendor->update();
                $request->session()->flash('message' ,'The Vendor data saved properly ');
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
