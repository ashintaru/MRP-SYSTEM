@extends('layouts.app')
@extends('layouts.header')
@section('container')
  <body>
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
      <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <header class=" bg-gray-600  text-white font-bold rounded"> 
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <h1 class="p-2">Model Management</h1>
                </div>
            </div>
        </header>
        <div class="m-3 flex flex-row-reverse  justify-between items-center">
          <h2 class=" text-red-500 font-semibold"> <a href="{{URL('master-list')}}"> Go Back </a> </h2>
          <button class="px-6 py-3 bg-red-600 text-gray-100 rounded shadow" id="delete-btn">
            Create New Model 
          </button>
        </div> 
        <div class="overflow-x-auto">
          <table class="min-w-full">
            <thead class="border-b">
              <tr>
                <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                  Model Name
                </th>
                <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                  Model Create
                </th>
                <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                  Model Update
                </th>
                <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                  Status
                </th>
                <th s cope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              @if($models!=null)
              @foreach($models as $model)
              <tr class="border-b">
                  <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$model['modelName']}}</td>
                  <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$model['modelCreate']}}</td>
                  <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{ 
                  \Carbon\Carbon::parse($model['modelUpdate'])->diffForHumans() }}</td>
                  <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                    @if($model['isActive']==1)
                    <i class="bg-green-500 hover:bg-green-900 text-white font-bold py-2 px-2 rounded-full fas fa-check"></i>
                    @elseif($model['isActive']==0)
                    <i class="fas fa-times bg-red-500 hover:bg-red-900 text-white font-bold py-2 px-3 rounded-full"></i>
                    @endif
                  </td>
                  <td class="text-sm text-black font-medium px-6 py-4 whitespace-nowrap">
                    <a class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" href="{{ route('modify-model', ['key1' => $model['modelId'] ] )}}" >
                      Edit
                      <i class="fa fa-pen"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
              @else
                <tr>
                  <td> No data Inserted </td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
        {{-- @if($models!=null)
          <div class=" bg-white rounded-xl shadow-md ">
                  {{$models->links()}}  
          <div>
        @else
        <div class=" bg-white rounded-xl shadow-md ">
          
        <div>
        @endif --}}
      </div>
    </div>

    <div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center" id="overlay">
        <div class="bg-gray-200 max-w-lg py-2 px-3 rounded shadow-xl text-gray-800">
            <div class="flex justify-between items-center">
                <h4 class="text-lg font-bold">Create New Model</h4>
                <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="p-8">
              <form action = "{{URL('model')}}" method="POST">
                @csrf
              <div class="grid grid-flow-row-dense grid-cols-4 grid-rows-4 items-center place-content-center space-y-5">
                      <div class="col-span-4"><span>Model Info</span></div>
                      <div class="col-span-2">
                        <p> Model Name: </p>
                      </div> 
                      <div class="col-span-2">
                          <input id="input" class="border-2 border-blue-500" type="text" required="true" value="{{ old('modelName') }}" name="modelName">
                      </div> 
                      <span id="output"></span>      
                      <div class="col-span-4">
                        <button type="submit" class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
                      </div>
                </div>
              </div>
            </div>
          </form>
        </div>
    </div>
  <script>
        window.addEventListener('DOMContentLoaded', () =>{
            const overlay = document.querySelector('#overlay')
            const delBtn = document.querySelector('#delete-btn')
            const closeBtn = document.querySelector('#close-modal')

            const toggleModal = () => {
                overlay.classList.toggle('hidden')
                overlay.classList.toggle('flex')
            }
            delBtn.addEventListener('click', toggleModal)

            closeBtn.addEventListener('click', toggleModal)

            var count = document.querySelectorAll('input.inputBox').length;
            var inputBox = document.getElementsByClassName("inputBox");

                var invalidChars = [
                "-",
                "+",
                "e",
                ];
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