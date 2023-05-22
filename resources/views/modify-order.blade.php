@extends('layouts.app')
@extends('layouts.header')
@section('container')
  <body>
    <div class="container my-12 mx-auto px-4 md:px-12">
      <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
          <header class=" bg-gray-600  text-white font-bold rounded"> 
            <div class="flex justify-between">
                <div class="p-3 mx-3 inline-flex items-center">
                  <h2 class=" font-semibold">  Modify Order Form </h2>
                </div>
                <div class="p-3 mx-3 inline-flex items-center">
                  <h2 class="font-semibold"> <a href="{{URL('showOrderList/'.$orders->ordListId)}}"> Go Back </a> </h2>          
                </div>
            </div>
          </header>
         </div>
        </div>
      <div class="flex flex-wrap -mx-1 lg:-mx-4">
        <div class="my-1 px-1 w-full md:w-1/1 lg:my-4 lg:px-4 lg:w-1/1">        
          <form action="{{  url('modifyOrder/'.$orders->orderNo )  }}" method="POST">
            @csrf
            @method('PUT')
                  <div class="grid grid-flow-row-dense grid-cols-4 grid-rows-4 items-center place-content-center space-y-5">
                    <div class="col-span-4">
                      {{-- @if(session('message'))
                        <h1 class="text-green-600">{{session('message')}}</h1>
                      @endif
                      @if($errors->any())
                      @foreach($errors->all() as $err)
                        <span>**{{$err}}**  </span>
                      @endforeach
                    @endif       --}}
                  </div>
                  <div class="col-span-4"><span>Material Info</span></div>
                  <div class="col-span-2">
                    <p> Material Name:</p>
                  </div> 
                  <div class="col-span-2">
                      <select class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
                      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="material">
                      @foreach($materials as $mats)
                        @if( $orders->materialCode == $mats['materialId'] )
                        <option value="{{ $mats['materialId'] }}" selected="select">{{ $mats['materialCode']}}</option>
                        @else
                          <option value="{{ $mats['materialId'] }}">{{ $mats['materialCode']}}</option>
                        @endif
                      @endforeach
                      </select>
                  </div>
                  <div class="col-span-2">
                    <p> Material Quantity: </p>
                  </div> 
                  <div class="col-span-2">
                      <input class="inputBox border-2 border-blue-500" type="number" required="true" value="{{ $orders->orderQtty}}" name="qtty">
                  </div>      
                  <div class="col-span-2">
                    <p> Date te Receive:</p>
                  </div>
                  <div class="col-span-2"> 
                  <input class="border-2 border-blue-500" type="date" value="{{ $orders->orderDate }}" name="fixDate">
                  </div> 
                  <div class="col-span-4">
                    <button type="submit" class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
                  </div>     
              </form>


        </div>
      </div>
    </div>
     {{-- <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-3xl">
      <div class="p-3">
        <div class="flex flex-row-reverse p-3">
          <h2 class=" text-red-500 font-semibold"> <a href="{{URL('showOrderList/'.$orders->ordListId)}}"> Modify Account Form </a> </h2>
        </div>
      </div>
    <div class="flex justify-center items-center h-screen">
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md">
            <div class="p-5">
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
      
      $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });
       });


  </script>
    @endsection