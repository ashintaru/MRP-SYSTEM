@extends('layouts.app')
@extends('layouts.header')
@section('container')
  <body>
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
      <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">

        <div class="m-3 flex justify-between p-1 bg-gray-600  text-white font-bold rounded">
          <h1 class="p-2">Model List Modifify </h1>
          <h1 class="p-2"><a href={{url('master-list')}}> Go Back </a> </h1>
        </div>
        <div class="m-3">
          @if(session('message'))
          <div class="flex items-center mb-2 bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{session('message')}}</p>
          </div>
        </div>
           @endif
          <div class="m-3">
            @if(session('err_message'))
            <div class="flex items-center mb-2 bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
              <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
              <p>{{session('err_message')}}</p>
            </div>          
          </div>
          @endif

          <form action="{{  url('modifyMasterList/'.$list['listId'] )  }}" method="POST">
            @csrf
            @method('PUT')
                  <div class="grid grid-flow-row-dense grid-cols-4 grid-rows-4 items-center place-content-center space-y-5">
                    <div class="col-span-2"><p> Model Name: </p></div>
                    <div class="col-span-2">
                      <select class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
                      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="modelCode">
                      @foreach($models as $model)
                        @if( $model['modelId'] == $list['modelCode'] )
                        <option value="{{$model['modelId'] }}" selected="select">{{$model['modelName'] }}</option>
                        @else
                        <option value="{{$model['modelId'] }}" >{{$model['modelName'] }}</option>
                        @endif
                      @endforeach
                      </select>
                    </div>
                    <div class="col-span-2"><p> List Status </p></div>
                    <div class="col-span-2">
                      <select class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
                      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="status">
                      @foreach($status as $sta)
                        @if( $sta['statusId'] == $list['isActive'] )
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
                  </div>
           </form>


        <div class="flex justify-center items-center">
          <div class="block rounded-lg shadow-lg bg-white max-w-md">
              <div class="p-7">
            
                </div>
          </div>
        </div>
      </div>
    </div>
     {{-- <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-3xl">
      <div class="p-3">
        <div class="flex flex-row-reverse p-3">
          <h2 class=" text-red-500 font-semibold"> <a href="{{URL('master-list')}}"> Modify Model Form </a> </h2>
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