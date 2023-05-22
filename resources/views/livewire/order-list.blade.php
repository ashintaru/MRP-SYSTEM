<div>
  @include('layouts.header')
  @include('livewire.order-list-create-form')
  @include('livewire.order-create-report')
  <div class="container my-6 mx-auto px-4 md:px-6">   
    <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
              <a href="{{URL('list')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
              <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
              Order Management
              </a>
          </li>
        </ol>
    </nav>
    <div class="flex flex-wrap -mx-1/2 lg:-mx-1/3 py-3 ">
      <div class="flex justify-evenly space-x-8">
        <div class="relative flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute ml-3 pointer-events-none outline-none">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
          </svg>
          
          <input wire:model="search2" value="{{old('username')}}" type="text" placeholder="Search" class="pr-3 pl-10 py-2 rounded-full w-64 text-gray-700 focus-within:text-gray-600 focus:text-gray-500 placeholder:text-gray-600 placeholder:font-semibold" name="username" >     
        </div>
        @if(session('type')=='admin') 
            <button id="add" class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-2xl" wire:click.prevent="clear" data-tooltip-target="tooltip-top" type="button" data-modal-toggle="create-modal">
              <svg class="w-6 h-6 mr-2 flex items-center" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="">Create New Order List </span>
            </button>                               
            <div id="tooltip-top" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Create Orde List
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>  
          @endif
          <button id="forecast" class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-2xl"  data-tooltip-target="tooltip-top1" type="button" data-modal-toggle="report-modal" wire:click.prevent="clear" >
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            Generate Report
            
        </button>                               
        <div id="tooltip-top1" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Generate Report
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>     
      </div>
  
     </div>


    </div>

    <div class="container mx-auto px-4 md:px-12 ">
      <div class="flex flex-wrap -mx-1/2 lg:-mx-1/3 ">
          @if($masterList != null )
            @foreach($masterList as $list)
              <div class="  my-1 px-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                <div class="transition ease-in-out delay-150  hover:-translate-y-1  hover:scale-110 w-full max-w-sm bg-white rounded-lg border shadow-2xl border-gray-200  dark:bg-gray-800 dark:border-gray-700">
                  @if($show==1 &&  $list->orderListId == $orderListid)
                    <div class="py-6 px-6 lg:px-8">
                      <div class="flex justify-between">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit a Production List</h3>
                        <button id="dropdownButton" wire:click.prevent="hide" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-red-500 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                          <span class="sr-only">Open dropdown</span>
                          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>     
                      </div>
                      <form class="space-y-6">
                          <div>
                              <label for="Title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">production List Title</label>
                              <input type="text" wire:model="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                              @error('title')<span class="text-red-700">{{$message}}</span>@enderror                  
                          </div>
                          <div>
                              <label for="memo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Production List Memo</label>
                              <textarea wire:model="memo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                              </textarea>
                              @error('memo')<span class="text-red-700">{{$message}}</span>@enderror                  
                          </div>
                          <div>
                              <label for="finalDate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Final Date</label>
                              <input type="date" wire:model="fixDate" value="{{ old('username') }}" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" >
                              @error('fixDate')<span class="text-red-700">{{$message}}</span>@enderror                  
                          </div>
                              <label for="finalDate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">List Status</label>
                          <div>
                            @if($select==1)
                            <label for="green-toggle" class="inline-flex relative items-center mr-5 cursor-pointer">
                                <input type="checkbox" wire:model="select" value="" id="green-toggle" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>                                                      
                            </label>    
                          @else
                            <label for="red-toggle" class="inline-flex relative items-center mr-5 cursor-pointer">
                                <input type="checkbox" wire:model="select" value="" id="red-toggle" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-red-300 dark:peer-focus:ring-red-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-600"></div>                                                        
                            </label>
                          @endif 
                          </div>
                          <div class="flex justify-end">
                            <button data-modal-toggle="view-modal" data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom" wire:click.prevent = "update()" class=" flex items-center p-2 text-base font-normal py-2 px-4  text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">                                
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                <span class="">save</span>
                                </button>
                          </div>
      
                      </form>
                    </div>
                  @else
                    <div class="flex flex-col items-center pt-10">                    
                      <svg class="mb-3 w-24 h-24 rounded-full shadow-lg"  viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                        <g transform="translate(0 -1028.4)">
                         <path d="m3.1875 6l-2 10h2v-7h18v7h2l-2-10h-18z" transform="translate(0 1028.4)" fill="#f39c12"/>
                         <path d="m3.1875 1037.4-2 14h2 18 2l-2-14h-18z" fill="#e67e22"/>
                         <path d="m9 1030.4v5h-3v0.9 0.1h0.0312l5.9688 6.5 5.969-6.5 0.031-0.1v-0.9h-3v-5h-6z" fill="#2c3e50"/>
                         <path d="m1.1875 1044.4v7h22v-7h-8.188c-0.416 1.1-1.511 2-2.812 2-1.302 0-2.3975-0.9-2.813-2h-8.1875z" fill="#f1c40f"/>
                         <rect height="1" width="22" y="1051.4" x="1.1875" fill="#f39c12"/>
                         <path d="m9 0v1 5.9688h-3l6 6.5312 6-6.5312h-3v-5.9688-1h-6z" transform="translate(0 1028.4)" fill="#34495e"/>
                        </g>
                       </svg>
                        <div>
                              <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$list->orderListTitle}}</h5>
                        </div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Order List</span>
                        <div class="flex mt-4 space-x-3 md:mt-6">
                                @if($list->isActive == 1)
                                    <div class="flex items-center">
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> 
                                            <span class=" text-gray-900 dark:text-gray-800">Active</span> 
                                    </div>
                                    @else
                                    <div class="flex items-center">
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-400 mr-2"></div> 
                                            <span class=" text-gray-900 dark:text-gray-800">De - Active</span> 
                                    </div>
                                @endif
                        </div>
                        <div class="flex mt-4 space-x-3 md:mt-6">
                          @if(session('type')=='admin')           
                            <button data-modal-toggle="view-modal" data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom" wire:click.prevent = "edit({{$list->orderListId}})" class="inline-flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-2xl">                                
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                <span class="">Edit</span>
                                </button>
                                <div id="tooltip-bottom" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Edit Order List
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                          @endif
                            <a href="{{ URL('orders', ['key1' => $list->orderListId] )}}" data-tooltip-target="tooltip-bottom1" data-tooltip-placement="bottom" class="inline-flex text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  shadow-2xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                <span class="">View</span>
                            </a>
                            <div id="tooltip-bottom1" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                View Orders
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <a href="{{ URL('order-report', ['key1' => $list->orderListId] )}}"  data-tooltip-placement="bottom" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-gray-200 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
                              <span class="">Report</span>
                            </a>
                        </div>
                        <div class="flex p-3 mt-4 space-x-3 md:mt-6">
                            <div class="flex flex-col bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                <span>Date Created:</span>
                                <span>{{\Carbon\Carbon::parse($list->datecreated)->format('F d Y')}}</span>
                            </div>
                            <div class="flex flex-col bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                              <span>Order Count:</span>
                              <span class="text-center">{{$list->orderCount}}</span>
                          </div>
                            <div class="flex flex-col bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                <span>Date Updated:</span>
                                <span>{{\Carbon\Carbon::parse($list->dateUpdated)->diffForHumans()}}</span>
                            </div>
                        </div>
                    </div>
                  @endif
                </div>
             </div>
            @endforeach
          @endif
      </div>
   </div>   

   <div class="max-w-md mx-auto md:max-w-7xl">
    {{ $masterList->linkS() }} 
  </div>

  <section>
    @if(session()->has('failed'))
    <div class="fixed bottom-5 left-5">
        <div id="toast-warning" class="flex items-center p-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Warning icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">{{session('failed')}}</div>
            <button wire:click.prevent="closed" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </div>
    @endif
    @if(session()->has('delete'))
    <div class="fixed bottom-5 left-5">
        <div id="toast-danger" class="flex items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">Item has been deleted.</div>
            <button wire:click.prevent="closed" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>      
    </div>
    @endif
    @if(session()->has('message'))
    <div class="fixed bottom-5 left-5">
        <div id="toast-success" class="flex items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">{{session('message')}}</div>
            <button wire:click.prevent="closed" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </div>
    @endif
  </section>
</div>

 