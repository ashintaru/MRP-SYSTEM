<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class Index extends Component
{
    public $username;
    public $password;

    public function render()
    {
        
        // URL::to('/');
        return view('livewire.index');
        // return dd(URL::current());

    }
    public function submit(Request $req ){
        $this->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        $user = account::where('accUserName', $this->username)->first();
        if($user!=null){
            if($user->accPassWord == $this->password){
                if($user->typeId == 0 && $user->isActive == 1){
                    $type='admin';
                    $req->session()->put('accId',$user->accId);
                    $req->session()->put('type',$type);
                    // return dd($datas[$index]);
                    return redirect('dashboard');                        
                }
                elseif($user->typeId == 1 && $user->isActive == 1){
                    $type='user';
                    $req->session()->put('accId',$user->accId);
                    $req->session()->put('type',$type);
                    // return dd($datas[$index]);
                    return redirect('dashboard');
                }
                elseif($user->isActive == 0){
                    $req->session()->flash('message','This Account Probably Not-active');
                    // return redirect()->back()->withInput()->withErrors($validator);                        
                }
                else{
                    $req->session()->flash('message','Wrong Credentials');
                    // return redirect()->back()->withInput()->withErrors($validator);                      
                }
            }else{
                $req->session()->flash('message','Password is Incorect');
                //  return redirect()->back()->withInput()->withErrors($validator);
                } 
        }else{
            $req->session()->flash('message','Not yet Exsisted');
            // return redirect()->back()->withInput()->withErrors($validator);
        }
        

    }

    public function logout( Request $req){
        $req->session()->put('accId',null);
        $req->session()->put('type',null);
        return redirect('/');
    }
}
