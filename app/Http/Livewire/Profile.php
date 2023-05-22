<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\account;

class Profile extends Component
{
    public function render()
    {
        $list = account::where('accId',session('accId'))->first();
        $data = json_decode($list,true);
        // return dd($data);
        return view('livewire.profile',['profile'=>$list]);
    }
}
