<div>
  @include('layouts.header')
    {{-- @include('livewire.material-edit-form') --}}
    <div class="container mx-auto  md:px-12 p-6 bg-transparent">
        <div class="overflow-x-auto relative">
            <div class="container my-1 mx-auto px-4 md:px-6">
                <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Inventory Management
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"> Material</span>
                        </div>
                    </li>
                    </ol>
                </nav>
                <div class="flex justify-between items-center ml-3">
                  <div class="my-6 flex flex-grow justify-items-stretch items-center space-x-3">
                      <div class="relative flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute ml-3 pointer-events-none outline-none">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        
                        <input wire:model="search2" value="{{old('username')}}" type="text" placeholder="Search" class="pr-3 pl-10 py-2 rounded-full w-64 text-gray-700 focus-within:text-gray-600 focus:text-gray-500 placeholder:text-gray-600 placeholder:font-semibold" name="username" >     
                      </div>
              
                      <select wire:model="filter3" class="rounded-lg w-40">
                        <option value="currentQtty" class="">Quantity</option>
                        <option value="materialCode">Material Code</option>
                        <option value="invUpdated">Date Updated</option>
                      </select>

                      <select wire:model="filter1" class="rounded-lg w-40">
                        <option value="ASC" class="">ASCENDING</option>
                        <option value="DESC">DESCENDING</option>
                      </select>
              
                      <select wire:model="filter2"  name="" id="" class="rounded-lg w-24">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                      </select>
                  </div> 
                  <div class="my-6 flex flex-grow justify-items-end items-end space-x-3">
                    <a href="{{URL('inventory-report')}}" id="add" class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center space-x-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-2xl duration-300"  data-tooltip-target="tooltip-top" >
                      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                      <span>Generate Report </span>
                    </a>                               
                    <div id="tooltip-top" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Generate Report
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>  
                    <a href="{{URL('inventory-logs')}}" id="add" class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center space-x-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-2xl duration-300"  data-tooltip-target="tooltip-top1" >
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                      </svg>
                      
                      <span>Generate Logs </span>
                    </a>                               
                    <div id="tooltip-top1" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Generate Logs
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>  
         
                  </div>

                </div>
                <div class="overflow-x-auto">
                  <table class="border-1 border-black w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="border-black border-1 text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-400 dark:text-gray-400 ">
                      <tr class="">
                        <th scope="col" class=" text-sm font-large text-gray-900 px-6 py-4 text-left">
                          #
                        </th>
                        <th scope="col" class=" text-sm font-large text-gray-900 px-6 py-4 text-left">
                          Material Code
                        </th>
                        <th scope="col" class=" text-sm font-large text-gray-900 px-6 py-4 text-left">
                          Quantity
                        </th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                          Date Updated
                        </th>
                        <th s cope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody class=" bg-white">
                      @if($list != null)
                      @foreach($list as $li)
                          <tr class="border-b">
                              <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                @if($show=1 && ( $action == 'add' || $action == 'modify' ) && $li->inventoryId == $invIds )
                                    <button id="dropdownButton" wire:click.prevent="hide" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 rounded-full text-sm p-1.5 hover:bg-gray-200" type="button">
                                      <span class="sr-only">Open dropdown</span>
                                      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>    
                                @else
                                    {{$index++}}
                                @endif
                              </td>
                              <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap" >{{$li->materialCode}}</td>
                              <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                
                                @if($show==1 && ( $action == 'add' || $action == 'modify' ) && $li->inventoryId == $invIds )
                                  <div>
                                      Curent Quantity : {{$li->currentQtty }}
                                    <input type="number" wire:model="newQuantity" id="first_name" class="inputBox text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="0" max="100000">    
                                  </div>
                                @else
                                  {{$li->currentQtty}}
                                @endif
                              </td>
                              <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $li->invUpdated)->format(' F d Y')}}</td>
                              <td  class="text-sm text-black font-medium whitespace-nowrap">
                                <div class=" flex justify-start">
                                    @if($show=1 && $action == 'add' && $li->inventoryId == $invIds )
                                        <button type="submit" wire:click.prevent="add"  class=" w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                    @elseif($show=1 && $action == 'modify' && $li->inventoryId == $invIds )
                                    <button type="submit" wire:click.prevent="modify"  class=" w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modify</button>
                                    @else
                                      <div>
                                        @if(session('type')=='admin') 
                                          <button data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom"  class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full text-sm p-1.5"  data-tooltip-target="tooltip-top1" type="button" wire:click.prevent="select1({{$li->inventoryId}})">
                                              <span class="sr-only">Edit List</span>  
                                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                              </svg>                                              
                                            </button>
                                            <div id="tooltip-bottom" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                              Modify Material Quantity
                                              <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div> 
                                        @endif
                                      </div>
                                      <div>
                                        <button data-tooltip-target="tooltip-bottom1" data-tooltip-placement="bottom" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 rounded-full text-sm p-1.5"  data-tooltip-target="tooltip-top1" type="button" wire:click.prevent="select({{$li->inventoryId}})">
                                        <span class="sr-only">Add List</span>  
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                        
                                      </button>
                                      <div id="tooltip-bottom1" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Add Material Quantity
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                      </div>
                                      </div>
                                    @endif
                                  </div>
                              </td>
                          </tr>
                      @endforeach
                  @else
                  <tr class="border-b">
                    <p>data table are empty</p>
                  </tr>
                @endif
                    </tbody>
                  </table>
                </div>
                {{-- <div class=" shadow-2xl sm:rounded-lg">
                                                
                  <table class=" text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                          #
                        </th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                          Material
                        </th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                          Quantity
                        </th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                          Date Updated
                        </th>
                      <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white">
                        @if($list != null)
                            @foreach($list as $li)
                                <tr class="border-b">
                                    <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                      @if($show=1 && ( $action == 'add' || $action == 'modify' ) && $li->inventoryId == $invIds )
                                          <button id="dropdownButton" wire:click.prevent="hide" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-red-500 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                                            <span class="sr-only">Open dropdown</span>
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                          </button>    
                                      @else
                                          {{$index++}}
                                      @endif
                                    </td>
                                    <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap" >{{$li->materialCode}}</td>
                                    <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                      
                                      @if($show==1 && ( $action == 'add' || $action == 'modify' ) && $li->inventoryId == $invIds )
                                        <div>
                                            Curent Quantity : {{$li->currentQtty }}
                                          <input type="number" wire:model="newQuantity" id="first_name" class="inputBox text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="0" max="100000">    
                                        </div>
                                      @else
                                        {{$li->currentQtty}}
                                      @endif
                                    </td>
                                    <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $li->invUpdated)->format(' F d Y')}}</td>
                                    <td  class="text-sm text-black font-medium px-6 py-4 whitespace-nowrap">
                                      <div class=" flex justify-start">
                                          @if($show=1 && $action == 'add' && $li->inventoryId == $invIds )
                                              <button type="submit" wire:click.prevent="add"  class=" w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                          @elseif($show=1 && $action == 'modify' && $li->inventoryId == $invIds )
                                          <button type="submit" wire:click.prevent="modify"  class=" w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modify</button>

                                          @else
                                            <div>
                                              @if(session('type')=='admin') 
                                                <button data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom"  class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"  data-tooltip-target="tooltip-top1" type="button" wire:click.prevent="select1({{$li->inventoryId}})">
                                                    <span class="sr-only">Edit List</span>  
                                                    <i class="fa fa-pen"></i>
                                                  </button>
                                                  <div id="tooltip-bottom" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                    Modify Material Quantity
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                  </div> 
                                              @endif
                                            </div>
                                            <div>
                                              <button data-tooltip-target="tooltip-bottom1" data-tooltip-placement="bottom" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"  data-tooltip-target="tooltip-top1" type="button" wire:click.prevent="select({{$li->inventoryId}})">
                                              <span class="sr-only">Add List</span>  
                                              <i class="fa fa-plus"></i>
                                            </button>
                                            <div id="tooltip-bottom1" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                              Add Material Quantity
                                              <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                            </div>
                                          @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                          <tr class="border-b">
                            <p>data table are empty</p>
                          </tr>
                        @endif
                    </tbody>
                  </table>
                </div> --}}
            </div>
        </div>
        <div class="flex pl-5 mt-2 font-semibold">
            {{$list->links()}}
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
</div>
