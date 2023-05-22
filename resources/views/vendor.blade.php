@extends('layouts.app')
@extends('layouts.header')
@section('container')
  <body>
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
      <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        
          <header class="p-1 bg-gray-600  text-white font-bold rounded"> 
            <div class="flex items-center">
                <div class="p-1 mx-3 inline-flex items-center">
                    <h1 class="p-2">Origin Management </h1>
                </div>
            </div>
        </header>        
        <div class="m-2 flex flex-row-reverse  justify-between items-center">
          <h2 class=" text-red-500 font-semibold"> <a href="{{URL('master-list')}}"> Go Back </a> </h2>
          {{-- <input name="search" placeholder="Seach here e.g Username" > --}}
          <button class="px-6 py-3 bg-red-600 text-gray-100 rounded shadow" id="delete-btn">
            Create New Vendor <i class="fa fa-plus"></i>
          </button>
        </div>

         <div class="overflow-x-auto">
              <table class="min-w-full">
                <thead class="border-b">
                  <tr>
                    <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                      Vendor Name
                    </th>
                    <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                      Lot Size
                    </th>
                    <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                      Lead Time
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
                    <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if($vendors != null)
                    @foreach($vendors as $vendor)
                    <tr class="border-b">
                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$vendor['vendorName']}}</td>
                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$vendor['vendorLotSize']}}</td>
                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap" >{{$vendor['vendorLeadTime']}}</td>
                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$vendor['vendorCreated']}}</td>
                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$vendor['vendorUpdate']}}</td>
                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                          @if($vendor['vendorStatus']==1)
                          <i class="bg-green-500 hover:bg-green-900 text-white font-bold py-2 px-2 rounded-full fas fa-check"></i>
                          @elseif($vendor['vendorStatus']!=1)
                          <i class="fas fa-times bg-red-500 hover:bg-red-900 text-white font-bold py-2 px-3 rounded-full"></i>z
                        @endif
                        </td>
                        <td class="text-sm text-black font-medium px-6 py-4 whitespace-nowrap">
                        <a class = "bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" href="{{ route('modify-vendor', ['key1' => $vendor['vendorId'] ] )}}" >Edit <i class="fa fa-pen"></i> </a>
                        </td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td></td>
                      <td>
                        <span>No record Found</span>
                      </td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
     
            <div class="p-3 bg-gray-300  ">
                <div class="text-white font-bold rounded">
                    {{$vendors->links()}} 
                </div>
            </div>
          
        

      </div>
    </div>
    {{-- <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-7xl">
      <div class="p-8">     
      </div>
      <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-7xl">
        <div class="p-8">
          <div class="flex flex-row justify items-center">
            <div>
              <h2 class=" text-red-500 font-semibold">Status :</h2>
            </div>
            <div> --}}
              {{-- @if(session('status') && session('message'))
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
            @if($errors->any())
            @foreach($errors->all() as $err)
              <span>**{{$err}}**  </span>
            @endforeach
          @endif       --}}
          {{-- </div>
        </div>
      </div>
      <div class="flex flex-col bg-grey ">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
           
          </div>
        </div>
      </div>

      </div> --}}
    <div class="bg-opacity-50 absolute inset-0 hidden justify-center items-center" id="overlay">
        <div class="bg-gray-200 max-w-lg py-2 px-3 rounded shadow-xl text-gray-800">
            <div class="flex justify-between items-center">
                <h4 class="text-lg font-bold">Create New Vendor</h4>
                <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="p-8">
              <form action = "{{URL('saveNewVen')}}" method="POST">
                @csrf
              <div class="grid grid-flow-row-dense grid-cols-4 grid-rows-4 items-center place-content-center space-y-5">
                      <div class="col-span-4"><span>Vendor Info</span></div>
                      <div class="col-span-2">
                        <p> Vendor Name: </p>
                      </div> 
                      <div class="col-span-2">
                          <input class="border-2 border-blue-500" type="text" required="true" value="{{ old('vendorName') }}" name="vendorName">
                      </div>      
                      <div class="col-span-2">
                        <p> Lot Size </p>
                      </div> 
                      <div class="col-span-2">
                          <input class="border-2 inputBox border-blue-500" type="number"  min="0" max="9999" value="{{ old('lotSize') }}" name="lotSize">
                      </div>      
                      <div class="col-span-2">
                        <p>Lead Time: </p>
                      </div> 
                      <div class="col-span-1">
                          <input class="border-2 inputBox border-blue-500" type="number" min="0" max="12" value="{{ old('leadTime') }}"  name="leadTime">
                      </div>
                      <div class="col-span-1">
                        <span>By Months </span>
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

            // var sites = {!! json_encode($vendors , JSON_HEX_TAG) !!};

            // console.log(sites);

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