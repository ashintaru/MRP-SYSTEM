<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\account;
use App\Models\orders;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\inventory;


class pageController extends Controller
{
    public function logIn(Request $req)
    {
        // return $req->input();
        // $datas = account::all();
        // $req->validate(['username'=>'required|min:2','password'=>'required|min:2']);
        $input = $req->input();
        $type='';
        $validator = Validator::make($req->all(), [
            'username'=>'required',
            'password'=>'required']);
        // return $req->input();
        // return dd($validator->errors());
        // return dd()
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            $user = account::where('accUserName', $input['username'])->first();
            if($user!=null){
                if($user->accPassWord == $input['password']){
                    if($user->typeId == 0 && $user->isActive == 1){
                        $type='admin';
                        $req->session()->put('accId',$user->accId);
                        $req->session()->put('type',$type);
                        // return dd($datas[$index]);
                        return redirect('admindb');                        
                    }
                    elseif($user->typeId == 1 && $user->isActive == 1){
                        $type='user';
                        $req->session()->put('accId',$user->accId);
                        $req->session()->put('type',$type);
                        // return dd($datas[$index]);
                        return redirect('userdb');
                    }
                    elseif($user->isActive == 0){
                        $req->session()->flash('message','This Account Probably Not-active');
                        return redirect()->back()->withInput()->withErrors($validator);                        
                    }
                    else{
                        $req->session()->flash('message','Wrong Credentials');
                        return redirect()->back()->withInput()->withErrors($validator);                      
                    }
                }else{
                    $req->session()->flash('message','Password is Incorect');
                     return redirect()->back()->withInput()->withErrors($validator);
                    } 
            }else{
                $req->session()->flash('message','Not yet Exsisted');
                return redirect()->back()->withInput()->withErrors($validator);
            }
        }
        
    }
    public function logout(Request $req)
    {
        $req->session()->put('accId',null);
        $req->session()->put('type',null);
        return view('logIn');
    }
    public function index(){
    $dt = Carbon::now()->format('Y-m-d');
    $newDate = Carbon::now()->addDays(7)->format('Y-m-d');
    $orders = orders::where('orderStatus',0)->join('orderlist','orderlist.orderListId','=','orders.ordListId')->join('materials','orders.materialCode','=','materials.materialId')->whereBetween('orderDate',[$dt,$newDate])->get();
    $data1 = json_decode($orders,true);
    $lowestInv = inventory::select(['materialCode','currentQtty'])->where('currentQtty','<>',0)->orderBy('currentQtty','ASC')->join('materials','inventory.materialId','=','materials.materialId')->offset(0)->limit(5)->get();
    $data2 = json_decode($lowestInv,true);
    $higesttInv = inventory::select(['materialCode','currentQtty'])->orderBy('currentQtty','DESC')->join('materials','inventory.materialId','=','materials.materialId')->offset(0)->limit(5)->get();
    $data3 = json_decode($higesttInv,true);
    $nullInv = inventory::select(['materialCode','currentQtty'])->where('currentQtty','=',0)->join('materials','inventory.materialId','=','materials.materialId')->get();
    $data4 = json_decode($nullInv,true);
    $warning = count($data4);
    $orderP = count($data1);
    $nullM = count($data4);
    // return dd($data1);
    // $orders = orders::select(*)->where();
        if( session('type')=='admin'){
            return view('admindb',['order'=>$data1,'least'=>$data2,'high'=>$data3,'null'=>$data4,'wc'=>$warning ,'c'=>$orderP,'n'=>$nullM]);
        }
        elseif(session('type')=='user'){
            return view('userdb');
        }else{
            return redirect()->back();
        }

    }
}
