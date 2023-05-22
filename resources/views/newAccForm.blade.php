@extends('layouts.app')
@section('container')
  <body>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
 
     <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-3xl">
      <div class="p-8">
        <div class="flex flex-row-reverse p-3">
          <h2 class=" text-red-500 font-semibold"> <a href="account"> New Account Form </a> </h2>
        </div>
      </div>
      <div class="p-8">
        @if($errors->any())
          @foreach($errors->all() as $err)
            <li>{{$err}}</li>
          @endforeach
        @endif
        <form action = "{{URL('saveNewAcc')}}" method="POST">
          @csrf
        <div class="grid grid-flow-row-dense grid-cols-4 grid-rows-4 items-center place-content-center space-y-5">
                <div class="col-span-4"><span>Account Info</span></div>
                <div class="col-span-2">
                  <p> Username: </p>
                </div> 
                <div class="col-span-2">
                    <input class="border-2 border-blue-500" type="text" value="{{ old('username') }}" name="username">
                </div>      
                <div class="col-span-2">
                  <p>  Password: </p>
                </div> 
                <div class="col-span-2">
                    <input class="border-2 border-blue-500" type="text" value="{{ old('password') }}" name="password">
                </div>      
                <div class="col-span-4"><span>Personal Info</span></div>
                <div class="col-span-2">
                  <p>First name: </p>
                </div> 
                <div class="col-span-2">
                    <input class="border-2 border-blue-500" type="text" value="{{ old('fname') }}"  name="fname">
                </div>      
                <div class="col-span-2">
                  <p> Middle name: </p>
                </div> 
                <div class="col-span-2">
                    <input class="border-2 border-blue-500" type="text" value="{{ old('mname') }}"  name="mname">
                </div>      
                <div class="col-span-2">
                  <p> Last name: </p>
                </div> 
                <div class="col-span-2">
                    <input class="border-2 border-blue-500" type="text" value="{{ old('lname') }}"  name="lname">
                </div>
                <div class="col-span-4"><span>Account Type</span></div>
                <div class="col-span-2">
                  <p> Account Type: </p>
                </div> 
                <div class="col-span-2">
                    <select name="type" class="border-2 border-blue-500" name="type">
                    @foreach($types as $type)
                      <option value="{{$type['typeId']}}">{{$type['typeName']}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="">
                    <button class="border-2 border-blue-500" >Submit</button>
                </div>
                <div>
                  @if(session('status') && session('message'))
                    @if(session('status')==true )
                      <span class="text-red-700">
                        {{session('message')}}
                      </span>
                    @else  
                      <span class="text-green-700">
                        {{session('message')}}
                      </span>
                    @endif
                  @endif
                </div>      
              </div>
        </div>
      </div>
    </form>
    </body>
    @endsection