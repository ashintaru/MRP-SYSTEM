
    <div class="">
      @include('layouts.header')
      <div class="">
          {{-- @include('livewire.order-create-form') --}}
          @include('livewire.prod-new-form')
          <section>
              <div class="container my-6 mx-auto px-4 md:px-6">   
                  <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                      <ol class="inline-flex items-center space-x-1 md:space-x-3">
                      <li class="inline-flex items-center">
                          <a class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                          <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                          Production Management
                          </a>
                      </li>
                      <li class="inline-flex items-center">
                        <a href="{{URL('production')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                          <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        Production List
                        </a>
                    </li>
                      <li aria-current="page">
                          <div class="flex items-center">
                          <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                          <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{$prList->Title}}</span>
                          </div>
                      </li>
                      </ol>
                  </nav>
                  <div class="flex justify-between items-center">
                    <div class="my-6 flex flex-grow justify-items-stretch items-center space-x-3">
                      <div class="relative flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute ml-3 pointer-events-none outline-none">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        
                        <input wire:model="search2" value="{{old('username')}}" type="text" placeholder="Search" class="pr-3 pl-10 py-2 rounded-full w-64 text-gray-700 focus-within:text-gray-600 focus:text-gray-500 placeholder:text-gray-600 placeholder:font-semibold" name="username" >     
                      </div>
                      <select wire:model="filter3"  name="" id="" class="rounded-lg w-64">
                        <option value="productionNo">Production No </option>
                        <option value="productQtty">Production Quantity</option>
                        <option value="productionLeadTime">Production Lead Time</option>
                        <option value="productionCreated">Production Created</option>
                      </select>
                        
                        <select wire:model="filter1" class="rounded-lg w-60">
                          <option value="ASC" class="">ASCENDING</option>
                          <option value="DESC">DESCENDING</option>
                        </select>
  
                        {{-- <select wire:model="filter2"  name="" id="" class="rounded-lg w-24">
                          <option value="5">5</option>
                          <option value="10">10</option>
                          <option value="15">15</option>
                          <option value="20">20</option>
                        </select> --}}
                    </div> 
                    <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium shadow-2xl rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button"  data-modal-toggle="authentication-modal" wire:click.prevent="resetField" data-tooltip-target="tooltip-top">
                      Create New Production
                      <i class="fa fa-plus"></i>
                    </button> 
                    <div id="tooltip-top" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Create Production
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>  
  
                  </div>
                  <div class="overflow-x-auto pt-3">
                      <table class="min-w-full bg-white">
                        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                          Memo / Notes
                          <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">{{$prList->memo}}</p>
                        </caption>
                        <thead class="border-b">
                          <tr>
                            <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                              #
                            </th>
                            <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                              MODEL NAME
                            </th>
                            <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                              # UNIT`
                            </th>
                            <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                              LEAD TIME
                            </th>
                            <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                              PRODUCTION END DATE
                            </th>
                            <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                              STATUS
                            </th>
                            <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                              SHORTAGE LIST 
                            </th>
                            <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                              ACTION
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white">
                          @foreach($lists as $list)
                          <tr class="bg-white ">
                              <td class="py-4 px-6">
                                @if($show == 1 && ($action == 'edit'|| $action == 'delete') && $list->productionNo == $orderId )
                                    <button id="dropdownButton" wire:click.prevent="hide" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-red-500 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                                      <span class="sr-only">Open dropdown</span>
                                      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>  
                                  </button> 
                                @else
                                  {{$index++}}
                                @endif
                              </td>
                              <td class="py-4 px-6" >
                             
                                  {{$list->modelName}}
                              </td>
                              <td class="py-4 px-6">
                                @if($show == 1 && $action == 'edit' && $list->productionNo == $orderId )    
                                  <div class="flex justify-between gap-x-4">
                                      <input type="number" wire:model="num" min="0" max="9999" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg  focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-600 dark:border-gray-500 text-center text-lg dark:placeholder-gray-400 dark:text-white inputBox" placeholder="" >
                                  </div>
                                @else
                                  {{$list->productQtty}}
                                @endif
                              </td>
                              <td class="py-4 px-6">
                                   {{$list->leadTime}} Days
                              </td>
                              <td class="py-4 px-6">
                                @if($show == 1 && $action == 'edit' && $list->productionNo == $orderId )
                                   <input type="date" wire:model="finalDate" value="{{ old('username') }}" name="username" class="inputBox bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                @else
                                  {{$list->productionLeadTime}}
                                @endif
                              </td>
                              <td class="py-4 px-6">
                                @if($list->productionStatus==1)
                                Success         
                                @elseif($list->productionStatus==0)
                                Pending
                                @endif
                              </td>
                              <td class="py-4 px-6">
                                @if($list->productionStatus==0)
                                <a target="_blank" href="{{URL('shortageList', ['key1' =>$list->shortageList] )}}"  data-tooltip-target="tooltip-top-shortage" class="inline-flex text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 shadow-2xl"data-tooltip-target="tooltip-top1" type="button">
                                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                <span class="ml-3">Shortage Materials </span>
                                </a>
                                <div id="tooltip-top-shortage" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                  View Shortage List
                                <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                @endif
                                {{-- @livewire('shortage-list',['listId'=>$list->shortageList]); --}}
                              </td>
                              <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                <div>  
                                @if($show == 1 && $action == 'edit' && $list->productionNo == $orderId )
                                    <button data-tooltip-target="tooltip-top-approve" class="inline-flex text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 shadow-2xl" type="button"  wire:click.prevent="update">
                                      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Approve
                                  </button>
                                  <div id="tooltip-top-approve" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                   Approve
                                  <div class="tooltip-arrow" data-popper-arrow></div>
                                  </div>
                                @elseif($show == 1 && $action == 'delete' && $list->productionNo == $orderId )
                                    <button data-tooltip-target="tooltip-top-approve" class="inline-flex text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 shadow-2xl" type="button"  wire:click.prevent="delete">
                                      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Delete
                                  </button>
                                  <div id="tooltip-top-approve" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                   DELETE
                                  <div class="tooltip-arrow" data-popper-arrow></div>
                                  </div>
                                @else
                                  @if($list->productionStatus!=1)
                                    <div>
                                      <button data-tooltip-target="tooltip-top-edit" class="inline-flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-2xl"  type="button" wire:click.prevent="edit('{{$list->productionNo}}')">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>Submit
                                      </button>
                                      <button data-tooltip-target="tooltip-top-edit" class="inline-flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-2xl"  type="button" wire:click.prevent="select('{{$list->productionNo}}')">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>Remove
                                      </button>
              
                                     
                                  </div>
                                  @endif
                                @endif
                                </div>  
                              </td>                          
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
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
  
  
  
  
