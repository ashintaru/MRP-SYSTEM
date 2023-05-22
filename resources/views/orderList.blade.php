@extends('layouts.app')
@extends('layouts.header')
@section('container')
<body>
  
  {{-- <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
      <div class="flex flex-row-reverse  justify-between items-center">
        @if(session('type')=='admin')
          <h2 class=" text-red-500 font-semibold"> <a href="admindb"> Master List Management </a> </h2>
        @else
          <h2 class=" text-red-500 font-semibold"> <a href="userdb"> Master List Management </a> </h2>
        @endif
          <input name="search" placeholder="Seach here e.g Username" >
        <button class="px-6 py-3 bg-red-600 text-gray-100 rounded shadow" id="delete-btn">
          Create New Order List 
        </button>
      </div>

      <div class="overflow-x-auto">
        <table class="min-w-full min-h-screen">
          <thead class="border-b">
            <tr>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                #
              </th>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                Order Quantity
              </th>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                Order Title
              </th>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                Memo
              </th>
              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                End Date
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
           @if($masterList != null)
              @foreach($masterList as $list)
                  <tr class="border-b">
                  <td class="px-10 py-6 whitespace-nowrap text-sm font-medium text-gray-900">{{$i++}}</td>
                  <td class="px-10 py-6 whitespace-nowrap text-sm font-medium text-gray-900">{{$list->orderCount}}</td>
                  <td class="px-10 py-6 whitespace-nowrap text-sm font-medium text-gray-900">{{$list->orderListTitle}}</td>
                  <td class="w-5/12  max-h-8">
                    <div class="text-sm text-gray-900 font-medium w-full h-20 overflow-y-auto">{{$list->memo}}</div>
                  </td>
                  <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$list->fixDate}}</td>
                  @if($list->isActive == 1)
                   <td class="text-sm text-green-900 font-medium px-6 py-4 whitespace-nowrap ">Open</td>
                  @else
                   <td class="text-sm text-red-900 font-medium px-6 py-4 whitespace-nowrap ">Closed</td>
                  @endif
                  <td class="text-sm text-black font-medium px-6 py-4 whitespace-nowrap">
                      <button class=" hover:bg-blue-300"><a href="{{ URL('modifyOrderList', ['key1' => $list->orderListId] ) }}" >Modify </a></button>
                      <button class=" hover:bg-blue-300"><a href="{{ URL('showOrderList', ['key1' => $list->orderListId] )}}" >Show </a></button>
                      @if($list->isActive == 1)
                      <button class=" hover:bg-blue-300"><a href="{{ URL('closedOrderList', ['key1' => $list->orderListId] )}}" >Closed </a></button>
                      @else
                      <button class=" hover:bg-blue-300"><a href="{{ URL('openOrderList', ['key1' => $list->orderListId] )}}" >Open </a></button>
                      @endif
                  </td>
              </tr>
              @endforeach
           @else
              <tr>
                 <span>No record Found</span>
              </tr>
           @endif
          </tbody>
      </table>
      </div>

      <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-7xl">
        {{ $masterList->linkS() }} 
      <div>

    </div>
  </div> --}}

  <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
      <div class="container my-12 mx-auto px-4 md:px-12">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
          <div class="flex flex-row-reverse  justify-between items-center">
            <button class="px-6 py-3 bg-red-600 text-gray-100 rounded shadow" id="delete-btn">
              Create New Order List 
            </button>
          </div>
    
        </div>
      </div>
      <div class="container my-12 mx-auto px-4 md:px-12 ">
        <div class="flex flex-wrap -mx-1/2 lg:-mx-1/3">
            <!-- Column -->
            @if($masterList != null)
            @foreach($masterList as $list)
            <div class="my-1 px-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                <!-- Article -->

                <article class="overflow-hidden rounded-lg shadow-lg">
                        <img alt="Placeholder" class="block h-auto w-full" src={{asset('image/yamaha.png')}}>
                    <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                        <h1 class="text-lg">
                            <a class="no-underline hover:underline text-black" href="#">
                              {{$i++}}  {{$list->orderListTitle}}
                            </a>
                        </h1>
                        <p class="text-black text-sm">
                          final Date: {{$list->fixDate}}
                        </p>
                    </header>
                    <div class="flex place-content-center p-2 md:p-4">
                      <div>
                        <span class="self-center"> {{$list->memo}}</span>   
                      </div>
                    </div>
                    <div class="flex place-content-center  p-2 md:p-4">
                          @if($list->isActive == 1)
                            <p class="self-center bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full">Status : Open</p>
                            @else
                            <p class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-full">Status : Closed</p>
                          @endif
                    </div>
                    <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                        
                        <a class="bg-teal-900 cursor-pointer rounde p-1 mx-1 text-white" href="{{ URL('modifyOrderList', ['key1' => $list->orderListId] ) }}" >Edit <i class="fa fa-pen"></i></a>
                        <a class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" href="{{ URL('showOrderList', ['key1' => $list->orderListId] )}}" >View <i class="fa fa-eye"></i> </a>
                        @if($list->isActive == 1)
                        <a class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white"  href="{{ URL('closedOrderList', ['key1' => $list->orderListId] )}}">Closed <i class="fa fa-folder"></i></a>
                        @else
                        <a class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" href="{{ URL('openOrderList', ['key1' => $list->orderListId] )}}" >Open <i class="fa fa-folder-open"></i>  </a>
                        @endif
                      </footer>
                </article>
            </div>
            @endforeach
            @else
               <tr>
                  <span>No record Found</span>
               </tr>
            @endif
            <!-- END Column -->
        </div>
    </div>
    
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-7xl">
      {{ $masterList->linkS() }} 
    <div>

    </div>
  </div>  

     <div class=" bg-opacity-50 absolute md:h-full inset-0 hidden justify-center items-center" id="overlay">
        <div class="bg-gray-200 max-w-lg py-2 px-3 rounded shadow-xl text-gray-800">
            <div class="flex justify-between items-center">
                <h4 class="text-lg font-bold">Create New Order List </h4>
                <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="p-8">
              <form action = "{{URL('orderList')}}" method="POST">
                @csrf
              <div class="grid grid-cols-2 grid-rows-1 items-center place-content-center space-y-5">
                <div class="col-span-4"><span>Order List Info</span></div>
                <div class="col-span-2">
                  <p> Order Title  </p>
                </div> 
                <div class="col-span-2">
                    <input class="border-2 border-blue-500" type="text" value="{{ old('title') }}" name="title">
                </div>      
                <div class="col-span-4">
                  <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Order Memo</label>
                  <textarea id="message" rows="4" class="block p-2.5 w-full text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('memo') }}" name="memo">
                  </textarea>
                </div>
                <div class="col-span-4 m-5">
                    <p> Estimated End Date </p>
                    <input class="border-2 border-blue-500" type="date" value="{{ old('fixDate') }}" name="fixDate">
                </div> 
                <div class="col-span-4">
                  <button type="submit" class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Create List</button>
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
            
            //dropdown
            const menuBtn = document.querySelector('#menu-btn')
            const dropdown = document.querySelector('#dropdown')
            
            menuBtn.addEventListener('click', () => {
                /* if(dropdown.classList.contains('hidden')){
                    dropdown.classList.remove('hidden');
                    dropdown.classList.add('flex');
                }else{
                    dropdown.classList.remove('flex')
                    dropdown.classList.add('hidden')
                } */

                dropdown.classList.toggle('hidden')
                dropdown.classList.toggle('flex')
            })
       
        })
        $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });
       });

    </script>

  @endsection
