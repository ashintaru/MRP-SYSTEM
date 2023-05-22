@extends('layouts.app')
@extends('layouts.header')
@section('container')
  <body>
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
      <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">

      <div class="m-2  bg-gray-600  text-white font-bold rounded flex justify-between items-center">
        <h1 class="p-2">Vendor Modify Form</h1>
        <h1 class="p-2"><a href="{{URL('vendor')}}"> Go Back </a></h1>
      </div> 
      <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
              <form action="{{  url('modify-vendor/'.$vendors['vendorId'] )  }}" method="POST">
                @csrf
                @method('PUT')
                      <div class="grid grid-flow-row-dense grid-cols-4 grid-rows-4 items-center place-content-center space-y-5">
                        <div class="col-span-4">
                      </div>
                      <div class="col-span-4"><span>Vendor Info</span></div>
                      <div class="col-span-2">
                        <p> Vendor Name: </p>
                      </div> 
                      <div class="col-span-2">
                          <input class="border-2 border-blue-500" type="text" required="true" value="{{ $vendors['vendorName']}}" name="vendorName">
                      </div>      
                      <div class="col-span-2">
                        <p>  Lot Size: </p>
                      </div> 
                      <div class="col-span-2">
                          <input class="border-2 inputBox border-blue-500" type="number"  min="0" max="9999"value="{{$vendors['vendorLotSize'] }}" name="lotSize" required="true">
                      </div>      
                      <div class="col-span-2">
                        <p>Lead Time: </p>
                      </div> 
                      <div class="col-span-1">
                          <input class="border-2 inputBox border-blue-500" required="true" type="number" min="0" max="12" value="{{ $vendors['vendorLeadTime'] }}"  name="leadTime">
                      </div>      
                      <div class="col-span-1">
                          <span>By Months </span>
                      </div>     
                      <div class="col-span-2">
                        <p> Account Status: </p>
                      </div> 
                      <div class="col-span-2">
                          <select class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="status">
                          @foreach($status as $sta)
                            @if( $sta['statusId'] == $vendors['vendorStatus'] )
                            <option value="{{ $sta['statusId'] }}" selected="select">{{$sta['status']}}</option>
                            @else
                            <option value="{{ $sta['statusId'] }}">{{ $sta['status'] }}</option>
                            @endif
                          @endforeach
                          </select>
                      </div>
                      <div class="col-span-4">
                        <button type="submit" class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
                      </div>
               </form>
        
            </div>
        </div>
      </div>

      </div>
    </div>
     {{-- <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-3xl">
      <div class="p-3">
        <div class="flex flex-row-reverse p-3">
          <h2 class=" text-red-500 font-semibold"> <a href="{{URL('vendor')}}"> Modify Account Form </a> </h2>
        </div>
      </div>
      <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-7xl">
        <div class="p-8">
          <div class="flex flex-row justify items-center">
            <div>
              <h2 class=" text-red-500 font-semibold">Status :</h2>
            </div>
            <div>
              <span class="text-red-700">
                {{session('message')}}
              </span>
            </div>
        </div>
      </div>
    <div class="flex justify-center items-center">
        <div class="block rounded-lg shadow-lg bg-white max-w-md">
            <div class="p-7">
            </div>
          </div>
      </div>
    </div> --}}
    </body>
    <script>
      window.addEventListener('DOMContentLoaded', () =>{
          var count = document.querySelectorAll('input.inputBox').length;
          var inputBox = document.getElementsByClassName("inputBox");
              var invalidChars = ["-","+","e",];
          for(let i = 0; i < count ; i++){
              inputBox[i].addEventListener("keydown", function(e) {
              if (invalidChars.includes(e.key)) {
                  e.preventDefault();
              }
              });
          }
      })

  </script>
    @endsection
           {{-- @if(session('message'))
                              <h1 class="text-green-600">{{session('message')}}</h1>
                            @endif
                            @if($errors->any())
                            @foreach($errors->all() as $err)
                              <span>**{{$err}}**  </span>
                            @endforeach
                          @endif       --}}