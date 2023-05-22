<div>
    @include('layouts.header')
    @include('livewire.account-create-form')
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 w-full">
            <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Account Management
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Account</span>
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
                    
                    <select wire:model="filter1" class="rounded-lg w-40">
                      <option value="ASC" class="">ASCENDING</option>
                      <option value="DESC">DESCENDING</option>
                    </select>

                    
                    <select wire:model="filter3"  name="" id="" class="rounded-lg w-64">
                        <option value="accId">Account ID</option>
                        <option value="accUserName">Account User Name</option>
                        <option value="fName">First Name</option>
                        <option value="mName">Midle Name</option>
                        <option value="lName">Last Name</option>
                        <option value="dateCreated">Date Created</option>
                        <option value="dateUpdated">Date Updated</option>
                        <option value="typeId">Account Status</option>
                      </select>
                      
                      <select wire:model="filter2"  name="" id="" class="rounded-lg w-24">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                      </select>
                </div> 
                <button id="add" class="block text-white space-x-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-2xl"  data-tooltip-target="tooltip-top" type="button" data-modal-toggle="create-modal" >
                    <i class="fa fa-plus"></i>
                    <span class="ml-3"> Create New Account </span>
                    {{-- wire:click.prevent="clear"  --}}
                    
                </button>   
                                              
                

            </div>
                



        
            <div class="overflow-x-auto">
                <table class="border-1 border-black w-fit text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="border-black border-1 text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-400 dark:text-gray-400 ">
                    <tr class="">
                        <th scope="col" class=" text-sm font-large text-gray-900 px-6 py-4 text-left">
                        #
                        </th>
                        <th scope="col" class=" text-sm font-large text-gray-900 px-6 py-4 text-left">
                        Username
                        </th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                        Pass-word
                        </th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                        Last Name
                        </th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                            First Name
                        </th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                            Middle Name
                        </th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                            Type
                        </th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                            Status
                        </th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                        Date Created
                        </th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                        Date Up-Dated
                        </th>
                        <th s cope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                        Action
                        </th>
                    </tr>
                    </thead>
                    <tbody class="">
                        @foreach($accounts as $acc)
                        <tr wire:key='tr-{{$acc->accId}}"' class="border-b bg-white">
                            <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                @if($show==1 && $acc->accId==$accId )
                                    <button id="dropdownButton" wire:click.prevent="hide" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 rounded-full text-sm p-1.5 hover:bg-gray-200" type="button">
                                    <span class="sr-only">Open dropdown</span>
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                  </button>     
                                @else   
                                  {{$index++}}
                                @endif           
                            </td>
                            <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                @if($show==1 && $acc->accId == $accId )
                                    <input type="text" wire:model="username" class="inputBox text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="8" max="100000" required>
                                   @error('username')<span class="text-red-600">{{$message}}</span>@enderror
                                   @else   
                                     {{$acc->accUserName}}
                                @endif        
                            </td>
                            <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap" >
                                @if($show==1 && $acc->accId==$accId )
                                   <input type="text" wire:model="password" class="inputBox text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="8" max="100000" required>
                                   @error('password')<span class="text-red-600">{{$message}}</span>@enderror
                              
                                @else   
                                    {{$acc->accPassWord}} 
                                @endif       
                            </td>
                            <td class="text-sm text-gray-600 font-small px-6 py-4 whitespace-nowrap">
                                @if($show==1 && $acc->accId==$accId )
                                 <input type="text" wire:model="lName" class="inputBox text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="2" max="30" required>
                                 @error('lName')<span class="text-red-600">{{$message}}</span>@enderror
                                @else   
                                    {{$acc->lName}} 
                                @endif       
                            </td>
                            <td class="text-sm text-gray-500 font-snall px-6 py-4 whitespace-nowrap">
                                @if($show==1 && $acc->accId==$accId )
                                  <input type="text" wire:model="fName" class="inputBox text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="2" max="30" required>
                                  @error('fName')<span class="text-red-600">{{$message}}</span>@enderror
                                @else   
                                   {{$acc->fName}}
                               @endif     
                            </td>
                            <td class="text-sm text-gray-500 font-snall px-6 py-4 whitespace-nowrap">
                                @if($show==1 && $acc->accId==$accId )
                                  <input type="text" wire:model="mName" class="inputBox text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="2" max="30" required>
                                  @error('mName')<span class="text-red-600">{{$message}}</span>@enderror
                                  
                               @else   
                                   {{$acc->mName}}
                               @endif    
                            </td>
                            <td class="text-sm text-gray-500 font-small px-6 py-4 whitespace-nowrap">
                                @if($show==1 && $acc->accId==$accId )
                                    <select wire:model='selectypes' class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white border-blue-600 focus:outline-none"  aria-label="Default select example" name="type">
                                        @if($types==null)
                                            <option value="">--Select Option--</option>
                                        @else
                                            <option value="">Select Option</option>
                                            @foreach($types as $sta)
                                                <option value="{{$sta['typeId']}}">{{$sta['typeName']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                @else   
                                    @if($acc->typeId==0)
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Admin</span>
                                    @else
                                    <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">User</span>
                                    @endif
                                @endif    
                            </td>
                            <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                @if($show==1 && $acc->accId==$accId )
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
                                @else   
                                    @if($acc->isActive==1)
                                    <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> 
                                        <span class=" text-gray-900 dark:text-gray-800">Active</span> 
                                        </div>
                                    @else
                                    <div class="flex items-center">
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-400 mr-2"></div> 
                                            <span class=" text-gray-900 dark:text-gray-800">Deactivated</span> 
                                    </div>
                                    @endif
                                @endif    
                            </td>
                            <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{\Carbon\Carbon::parse($acc->dateCreated)->format('F d Y')}}</td>
                            <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{\Carbon\Carbon::parse($acc->dateUpdated)->format('F d Y')}}</td>
                            
                            
                            {{-- <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$acc->status}}</td> --}}
                            
                            <td class="text-sm text-black font-medium px-6 py-4 whitespace-nowrap">
                                @if($show==1 && $acc->accId==$accId )
                                    <button data-tooltip-placement="bottom" class="flex items-center text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-full text-sm p-1.5"  data-tooltip-target="edit-tooltip" type="button" wire:click="update()">
                                        <span class="sr-only">Edit List</span>  
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-700">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                          </svg>
                                          
                                        
                                    </button>
                                    <div id="edit-tooltip" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Save Accounts
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                @else   
                                    <div>
                                        <button data-tooltip-placement="bottom" class="inline-flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-2xl"  data-tooltip-target="edit-tooltip" type="button" wire:click="select({{$acc->accId}})">
                                            <svg class="w-6 h-6 text-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            
                                        </button>
                                        <div id="edit-tooltip" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Modify Accounts
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </div>
                                @endif     
                                {{-- <a class="bg-blue-900 cursor-pointer rounded p-1 mx-1 text-white"
                            href="{{ route('modify', ['key1' => $acc->accId ,'key2' => $acc->personId] )}}" >
                            Edit
                            <i class="fas fa-edit"></i>
                            </a> --}}
                            {{-- <button class=" hover:bg-blue-300"><a href="{{ route('modify', ['key1' => $acc->accId ,'key2' => $acc->personId] )}}" >Modify </a></button> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>                       
            </div>
            <div class="flex mt-2">
                {{$accounts->links()}}
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