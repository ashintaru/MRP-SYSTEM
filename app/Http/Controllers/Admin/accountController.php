<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\account;
use App\Models\person;
use App\Models\status;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Redirect;

class accountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check(){
        echo 'have been checked';
    }
    public function index()
    {
        // $dt = Carbon::now()->format('Y-m-d');
        $datas = DB::table('accounts')->join('types', 'types.typeId', '=', 'accounts.typeId')->join('person', 'person.accId', '=', 'accounts.accId')->join('status','status.statusid','=','accounts.isActive')->orderBy('accounts.accId','DESC')->paginate(9);
        // $result = json_decode($datas,true);
        $data = DB::table('types')->get();
        $result = json_decode($data,true);
        // return dd($datas);
        if(session('accId')===null && session('type')!='admin'){
            return redirect()->back();
        }else{
            return view('account',['accounts'=>$datas , 'types' =>$result]);        
        }
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( )
    {
        $data = DB::table('types')->get();
        $result = json_decode($data,true);
        return view('newAccForm',['types'=>$result,'error'=> ' ']);
    }

    /**`
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $code ='akobuduy';
        // $code2 ='akobassy';
        // $hash = Hash::make($code);
        $dt = Carbon::now()->format('Y-m-d');
        $isActive = 1;
        $input = $request->input();
    
        // return $request->all();
        $validator=Validator::make($request->all(), [
            'username'=>'required|min:9',
            'password'=>'required|min:6',
            'fname'=>'required|min:2',
            'mname'=>'required|min:2',
            'lname'=>'required|min:2']);
        // variables
            $username = $input['username']; $password = $input['password'];$fname= $input['fname']; $mname = $input['mname'];
            $lname = $input['lname']; $type = $input['type']; $url = $input['url_P'];  
            // return redirect('createNewAcc')->withErrors($validator)->withInput();
        // logic
        if ($validator->fails()){
            return redirect()->intended($url)->withInput()->withErrors($validator);
        }else{
            //check if the username is exsist in the table accounts 
            $accid = DB::table('accounts')->max('accid');
            $perid = DB::table('person')->max('personId');
            $newAccId = $accid+1; $newPerId = $perid+1;
            $boolean=account::where('accUserName', $username)->exists();
            $request->session()->flash('status',$boolean);
                if( $boolean == true){
                    $request->session()->flash('username', $username);
                    $request->session()->flash('message' ,'The Data have not saved Properly');
                    return redirect()->intended($url)->withInput();
                }else{
                    //saving data to database
                    DB::insert('insert into accounts 
                    (accid,typeid,accUserName,accPassWord,dateCreated,dateUpdated,isActive ) 
                    values (?,?,?,?,?,?,?)', 
                    [$newAccId,$type,$username,$password,$dt,$dt,$isActive]);
                    DB::insert('insert into  person
                    (personId,accId,personFirstName,personMidleName,personLastName,personCreated,personUpdated) 
                    values (?,?,?,?,?,?,?)', 
                    [$newPerId,$newAccId,$fname,$mname,$lname,$dt,$dt]);
                    $request->session()->flash('username', $username);
                    $request->session()->flash('message' ,'The Data have been saved Properly');
                    return redirect()->intended($url); 
                }
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
    * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($key1,$key2)
    {
        $result = account::select('*')->join('person','person.accId','=','accounts.accId')->where('accounts.accId','=',$key1)->get();
        $resultDecode = json_decode(json_encode($result,true));
        $data = DB::table('types')->get();
        $status = status::get();
        $type = json_decode($data,true);
        // return dd($status);        
        return view('modifyForm',['acc'=>$resultDecode, 'types' => $type,'status'=>$status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $key1 ,$key2)
    {
        $message = "update succesfull";
        $dt = Carbon::now()->format('Y-m-d');
        $username=$request->input('username');
        //validation
        $validator=Validator::make($request->all(), [
            'username'=>'required|min:9',
            'password'=>'required|min:6',
            'fname'=>'required|min:2',
            'mname'=>'required|min:2',
            'lname'=>'required|min:2']);
            
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }else{

            $student = account::find($key1);
            $student->accPassWord=$request->input('password');
            $student->typeId=$request->input('type');
            $student->dateUpdated=$dt;
            $student->isActive=$request->input('status');

            $person = person::find($key2);
            $person->personFirstname=$request->input('fname');
            $person->personMidleName=$request->input('mname');
            $person->personLastName=$request->input('lname');
            $person->personUpdated=$dt;
            
            $boolean=account::where('accUserName', $username)->exists();
            if( $boolean == true ){
                $student->accUserName=$student->accUserName;
            }else{
                $student->accUserName=$request->input('username');
            }    
        }
        //saving data to database
        $person->update();
        $student->update();
        $request->session()->flash('message','The Data have Update Properly');
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
        //
    }
}
