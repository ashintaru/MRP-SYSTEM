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
                  <h2 class=" font-semibold">  Modify Order List Form </h2>
                </div>
                <div class="p-3 mx-3 inline-flex items-center">
                  <h2 class=" font-semibold"> <a href="{{URL('orderList')}}"> Go Back </a> </h2>
                </div>
            </div>
          </header>
         </div>
        </div>
      <div class="flex flex-wrap -mx-1 lg:-mx-4">
          <div class="my-1 px-1 w-full md:w-1/1 lg:my-4 lg:px-4 lg:w-1/1 border-black">        
            <form action = "{{URL('modifyOrderList/'.$list['orderListId'])}}" method="POST">
                @csrf
                @method('PUT')
              <div class="grid grid-flow-row-dense grid-cols-3 grid-rows-3 items-center place-content-center space-y-2">
                <div class="col-span-4"><span>Order List Info</span></div>
                <div class="col-span-2">
                  <p> Order Title</p>
                </div> 
                <div class="col-span-2">
                    <input class="border-2 border-blue-500" type="text" value="{{ $list['orderListTitle'] }}" required='true' name="title">
                </div>      
                <div class="col-span-4">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Order Memo</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-black dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" required='true' name="memo">
                    {{ $list['memo'] }}
                </textarea>
                </div>
                <div class="col-span-2">
                    <p> Estimated End Date </p>
                  </div> 
                  <div class="col-span-2">
                      <input class="border-2 border-blue-500" type="date" value="{{ $list['fixDate'] }}" name="fixDate">
                  </div>      
                  <div class="col-span-4">
                  <div class="col-span-4">
                  <button type="submit" class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Create List</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>   
    </body>
    @endsection