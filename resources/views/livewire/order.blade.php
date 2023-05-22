<div class="p-5">
    <div class="">
        @include('layouts.header')
        @include('livewire.order-create-form')
        <section>
            <div class="container my-6 mx-auto px-4 md:px-6">   
                <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Order Management
                    </li>
                    <li class="inline-flex items-center">
                    <a href="{{URL('list')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        Order List
                        </a>
                    </li>
                    <li class="inline-flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        @if($orList!=null)
                            {{$orList->orderListTitle}}
                        @endif
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
                        <option value="orderNo">Order No </option>
                        <option value="orderQtty">Order Quantity</option>
                        <option value="orderDate">Order Lead Date</option>
                        <option value="orderUpdate">Order Created</option>
                        <option value="materials.materialCode">Material Name</option>

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
                  
                    <button id="add" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-2xl"  data-tooltip-target="tooltip-top" type="button" data-modal-toggle="create-modal" wire:click.prevent='erase' >
                        Create New Order 
                        <i class="fa fa-plus"></i>
                    </button>                               
                    <div id="tooltip-top" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Create Order
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>     
  
                  </div>
  
                <div class="overflow-x-auto pt-3">
                    <table class="min-w-full bg-white">
                        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Memo / Notes
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                                @if($orList!=null)
                                    {{$orList->memo}}
                                @endif
                            </p>
                        </caption>
                      <thead class="border-b">
                        <tr>
                          <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                            #
                          </th>
                          <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                            Material Code
                          </th>
                          <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                            Order Quantity
                          </th>
                          <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                            Transmited to Inventory
                          </th>
                          <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                            Order Status
                          </th>
                          <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                              Order By
                          </th>
                          <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                              Order From
                          </th>
                          <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                              Order Deliver
                          </th>
                          <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody class="bg-white">
                        @if($lists != null)
                        @foreach($lists as $list)
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                              @if($show == 1 && ($action == "edit" || $action == "approve" || $action == "delete" )&& $list['orderNo'] == $orderId)                    
                                  <button id="dropdownButton" wire:click.prevent="hide" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-red-500 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                                      <span class="sr-only">Open dropdown</span>
                                      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                  </button>     
                              @else
                              {{$index++}}
                              @endif
                          </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                
                                      {{$list->materialCode}}
                            </td>
                            <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                              @if($show == 1 && $action == "edit" && $list['orderNo'] == $orderId)
                                  <input type="number" wire:model="quantity" id="first_name" class="inputBox text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="1" max="100000" required>
                                @error('quantity')<span class="text-red-700">{{$message}}</span>@enderror                  

                              @else
                                  {{$list['orderQtty']}}
                              @endif
                            </td>
                            <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$list['orderTrans']}}</td>
                            @if($list['orderStatus']==1)
                                  <td class="font-medium px-6 py-4 whitespace-nowrap">
                                    <span class="bg-blue-500 hover:bg-blue-900  rounded-full  px-1 py-1 text-white">
                                      Success
                                    </span>
                                  </td>
                            @else
                                  <td class="text-sm text-red-900 font-medium px-6 py-4 whitespace-nowrap">
                                    <span class="bg-red-500 hover:bg-red-900  rounded-full  px-1 py-1 text-white">
                                      Pending
                                    </span>
                                  </td>
                            @endif
                            <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap"> {{$list['lName'] }}</td>
                            <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$list['vendorName']}}</td>
                            <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                              @if($show == 1 && $action == "edit" && $list['orderNo'] == $orderId)
                                  <input type="date" wire:model="editdate" value="{{ old('username') }}" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" >
                                @error('editdate')<span class="text-red-700">{{$message}}</span>@enderror                  

                                @else
                                    {{$list['orderDate']}}
                                @endif
                            </td>
                              
                            <td class="text-sm text-black font-medium px-6 py-4 whitespace-nowrap">
                                  <div>
                                  @if($show == 1 && $action == "edit" && $list['orderNo'] == $orderId)
                                      <button class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" wire:click="update()" >edit 
                                          <i class="fa fa-thumbs-up"></i>
                                      </button>
                                  @elseif($show == 1 && $action == "approve" && $list['orderNo'] == $orderId)
                                        <button class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" wire:click="appove()" >Confirm 
                                            <i class="fa fa-thumbs-up"></i>
                                        </button>
                                    @elseif($show == 1 && $action == "delete" && $list['orderNo'] == $orderId)
                                        <button class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" wire:click="confirm()" >Confirm 
                                            <i class="fa fa-thumbs-up"></i>
                                        </button>
                                  @else
                                      <div>
                                      @if($list['orderStatus']==0)
                                          <button class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" wire:click="select('{{$list['orderNo']}}')" >Modify 
                                              <i class="fa fa-thumbs-up"></i>
                                          </button>
                                          @if(session('type')=='admin') 
                                            <button class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" 
                                            wire:click="select1('{{$list['orderNo']}}')">Approve 
                                                <i class="fa fa-thumbs-up"></i>
                                            </button>
                                            <a class="bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white" wire:click.prevent="select2('{{$list['orderNo']}}')" >Remove <i class="fa fa-trash"></i></a>    
                                          @endif
                                        
                                      @endif
                                      </div>
                                  @endif
                                  </div>
                            </td>
                          </tr>
                        @endforeach
                        @else
                        <td>
                          <span>No record Found</span>
                        </td>
                      @endif
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
            @if(session()->has('info'))
            <div class="fixed bottom-5 left-5">
                <div id="toast-success" class="flex items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                    <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ml-3 text-sm font-normal">{{session('info')}}</div>
                    <button wire:click.prevent="closed" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            </div>
            
            @endif
        </section>
    </div>
    <script>
          window.addEventListener('DOMContentLoaded', () =>{
              var count = document.querySelectorAll('input.inputBox').length;
              var inputBox = document.getElementsByClassName("inputBox");
                  var invalidChars = ["-","+","e","E"];
              for(let i = 0; i < count ; i++){
                  inputBox[i].addEventListener("keydown", function(e) {
                  if (invalidChars.includes(e.key)) {
                      e.preventDefault();
                  }
                  });
              }
  
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
                  dropdown.classList.toggle('hidden')
                  dropdown.classList.toggle('flex')
              })
         
          })
  
          $(document).ready(function () {

  
              const inventory = {!! json_encode($data4 , JSON_HEX_TAG) !!};
              const labeL1 = [];
              const labeL2 = [];
              const data1 = [];
              const data2 = []; 
              console.log(inventory);
              for (const x in inventory) {
                if(inventory[x].orderStatus == 0){
                  labeL1[labeL1.length] = inventory[x].materialCode;
                  data1[data1.length] = inventory[x].orderQtty;
                }else{
                  labeL2[labeL2.length] = inventory[x].materialCode;
                  data2[data2.length] = inventory[x].orderTrans;                            
                }
              }
  
              let totalPending = 0;
              let totalSucess = 0;
              let totalOrder = 0;
             
              let averagePending = 0;
              let averageSucces = 0; 
              let average = [];
  
              for (const i in data1) {
                // totalpending += totalpending + data1[i];
                totalPending += data1[i];
              }
              for (const i in data2) {
                // totalpending += totalpending + data1[i];
                totalSucess += data2[i];
              }
  
              totalOrder = totalPending + totalSucess; 
              averagePending = totalPending / totalOrder * 100; 
              averageSucces = totalSucess / totalOrder * 100;
  
              average.push(averagePending);
              average.push(averageSucces);
              
  
              $('#totalPending').text(totalPending);
              $('#totalSuccess').text(totalSucess);
  
              $('#percentPending').text(averagePending.toFixed(2));
              $('#percentSuccess').text(averageSucces.toFixed(2));
              console.log(average);
  
        const ctx1 = document.getElementById('myChart1').getContext('2d');
        const ctx2 = document.getElementById('myChart2').getContext('2d');
        const ctx3 = document.getElementById('myChart3').getContext('2d');
      
        const myChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: labeL1,
                datasets: [{
                    label: '# of Pending Orders',
                    data: data1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        }); 
  
        const myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: labeL2,
                datasets: [{
                    label: '# of Success Orders',
                    data: data2,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        }); 
  
        const myChart3 = new Chart(ctx3, {
            type: 'doughnut',
            data: {
                labels: ['Pending','Success'],
                datasets: [{
                    label: '# of Success Orders',
                    data: average,
                    backgroundColor: [
                      'rgb(255, 99, 132)',
                      'rgb(54, 162, 235)'
                    ],
                    hoverOffset: 4,
                }]
            }
        }); 
   
    
  
      });
      </script>
    
</div> 



