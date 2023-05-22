@extends('layouts.app')
@extends('layouts.header')
@section('container')
  <body>
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
      <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <header class=" bg-gray-600  text-white font-bold rounded"> 
          <div class="flex justify-between">
              <div class="p-1 mx-3 inline-flex items-center">
                  <h1 class="p-2">Material Management</h1>
              </div>
          </div>
        </header>
        <div class="m-1 flex flex-row-reverse  justify-between items-center">
          <h2 class=" text-red-500 font-semibold"> <a href="{{URL('master-list')}}"> Go Back </a> </h2>
          <button class="px-6 py-3 bg-red-600 text-gray-100 rounded shadow" id="delete-btn">
            Create New Material 
          </button>
        </div>

        <div class="overflow-x-auto">
          <table class="min-w-full">
            <thead class="border-b">
              <tr>
                <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                  Material Code
                </th>
                <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                  Vendor Name
                </th>
                <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                  Date Created
                </th>
                <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                  Date Up-Dated
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
              @foreach($materials as $material)
              <tr class="border-b">
                  <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$material['materialCode']}}</td>
                  <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$material['vendorName']}}</td>
                  <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$material['materialCreate']}}</td>
                  <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$material['materialUpdate']}}</td>
                  <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                    @if($material['isActive']==1)
                    <i class="bg-green-500 hover:bg-green-900 text-white font-bold py-2 px-2 rounded-full fas fa-check"></i>
                    @elseif($material['isActive']==0)
                    <i class="fas fa-times bg-red-500 hover:bg-red-900 text-white font-bold py-2 px-3 rounded-full"></i>
                    @endif
                  </td>
                  <td class="text-sm text-black font-medium px-6 py-4 whitespace-nowrap">
                   <a class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" href="{{ route('modify-material', ['key1' => $material['materialId'] ] )}}" >Edit <i class="fa fa-pen"></i> </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
        @if($materials!=null)
        <div class=" bg-gray-300 font-bold py-2 px-4 rounded-lshadow-md ">
                {{$materials->links()}}  
        <div>
        @else
        <div class=" bg-white rounded-xl shadow-md ">
        <div>
        @endif
        
      </div>
    </div>  
    
    <div class=" bg-opacity-50 absolute inset-0 hidden justify-center items-center" id="overlay">
        <div class="bg-gray-200 max-w-lg py-2 px-3 rounded shadow-xl text-gray-800">
            <div class="flex justify-between items-center">
                <h4 class="text-lg font-bold">Create New Material</h4>
                <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="p-8">
              <form action = "{{URL('saveNewMat')}}" method="POST">
                @csrf
              <div class="grid grid-flow-row-dense grid-cols-4 grid-rows-4 items-center place-content-center space-y-5">
                      <div class="col-span-4"><span>Material Info</span></div>
                      <div class="col-span-2">
                        <p> Material Code: </p>
                      </div> 
                      <div class="col-span-2">
                          <input class="border-2 border-blue-500" type="text" required="true" value="{{ old('materialCode') }}" name="materialCode">
                      </div>       
                    <div class="col-span-2">
                      <span>Vendor Name </span>
                  </div> 
                    <div class="col-span-2">
                      <select class=" block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
                      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="vendor" placeholder="Pick a Vendor">
                      @foreach($vendors as $ven)
                        @if( $ven['vendorId'] == old('vendor') )
                        <option value="{{$ven['vendorId']}}" selected="select">{{$ven['vendorName']}}</option>
                        @else
                        <option value="{{$ven['vendorId']}}">{{$ven['vendorName']}}</option>
                        @endif
                      @endforeach
                      </select>
                    </div>
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

        $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });
       });
    </script>
@endsection