@extends('layouts.app')
@extends('layouts.header')
@section('container')
  <body>
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
      <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">

        <span class="text-red-700">
          {{session('message')}}
        </span>

        <div class="flex bg-gray-600  text-white font-bold rounded justify-between p-3">
          <h2 class=" "> Modify Component Form</h2>
          
          <h2 class=" "> <a href="{{URL('showMasterList/'.$component['listId']  )}}"> Go Back </a> </h2>
        </div>
        
        <form action="{{  url('modifyComponent/'.$component['componentId'] )  }}" method="POST">
          @csrf
          @method('PUT')
                <div class="grid grid-flow-row-dense grid-cols-4 grid-rows-4 items-center place-content-center space-y-5">
                  {{-- <div class="col-span-4">
                    @if(session('message'))
                      <h1 class="text-green-600">{{session('message')}}</h1>
                    @endif
                    @if($errors->any())
                    @foreach($errors->all() as $err)
                      <span>**{{$err}}**  </span>
                    @endforeach
                  @endif      
                </div> --}}
                <div class="col-span-4"><span>Component Info</span></div>     
                <div class="col-span-2">
                  <p> Material Name:</p>
                </div> 
                <div class="col-span-2">
                    <select class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="material" >
                    @foreach($materials as $mats)
                      @if( $mats['materialId'] == $component['materialId'] )
                      <option value="{{$mats['materialId'] }}" selected="select">{{$mats['materialCode']}}</option>
                      @else
                          <option value="{{$mats['materialId'] }}">{{$mats['materialCode']}}</option>
                      @endif
                    @endforeach
                    </select>
                </div>
                <div class="col-span-2">
                  <p>  Fixed Quantity</p>
                </div> 
                <div class="col-span-2">
                    <input class="border-2 inputBox border-blue-500" required="true" type="number" min="0" max="1000" value="{{ $component['fixedQtty']}}" name="qtty">
                </div>
                <div class="col-span-4">
                  <button type="submit" class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
                </div>
               
    </form>
      </div>
    </div>

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