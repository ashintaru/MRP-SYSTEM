@extends('layouts.app')
@extends('layouts.header')
@section('container')
  <body>
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
      <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <header class=" bg-gray-600  text-white font-bold rounded"> 
          <div class="m-1 flex flex-row-reverse  justify-between items-center p-4">
            <h3 class=""> <a href="{{URL('inventory')}}"> Go Back</a> </h3>
            <h1 class="">Modify Material Form</h1>
          </div>      
        </header>

        <div class="container my-12 mx-auto px-4 md:px-6">
          <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
            <div class="my-1 px-1 w-full md:w-1/1 lg:my-4 lg:px-4 lg:w-1/1">

              <form action="{{  url('modifyinventory/'.$data1['materialId'] )  }}" method="POST">
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
                      <div class="col-span-4 ">
                        <span class="bg-blue-500 p-1 mx-1 text-white">Material Info</span>
                      </div>
                      <div class="col-span-2">
                        <p> Material Code: </p>
                      </div> 
                      <div class="col-span-2">
                          <p>{{$data2['materialCode']}}</p>
                      </div>      
                      <div class="col-span-2">
                          <p> Current Quantity</p>
                      </div>   
                      <div class="col-span-2">
                          <p>{{$data1['currentQtty']}}</p>
                      </div>
                      <div class="col-span-2">
                          <p>New Quantity</p>
                      </div>  
                      <div class="col-span-2">
                        <input class="border-2 border-blue-500  inputBox" type="number" id="input" required="true" name="qtty">
                      </div>
                      <div class="col-span-2">
                          <p>Final Quantity</p>
                      </div>  
                      <div class="col-span-2">
                          <p id="output"></p>
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
    </div> --}}
    </body>
    <script>
    //         var sites = {!! json_encode($data1 , JSON_HEX_TAG) !!};
    // // console.log(sites[1].materialCodex);
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
      });

      $(document).ready(function () {
        var inventory = {!! json_encode($data1 , JSON_HEX_TAG) !!};
        var number2 = parseInt(inventory.currentQtty)
        $('#output').text(number2);
        $('#input').on('input',function(){
            var input = $('#input').val();
            var number1 = parseInt(input);
            // var FinalNum = number1 + number2;
            $('#output').text(number1);
            if(input.length == 0){
                $('#output').text(number2);
            }else
                $('#output').text(number1);
        });

       });
      
  </script>
    @endsection