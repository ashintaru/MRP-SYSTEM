<section>
    <div>
        <div>
        @include('layouts.header')

            @include('livewire.components-new-form')
            {{-- @include('livewire.remove-form') --}}
            {{-- @include('livewire.components-edit-form') --}}
        </div>
        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
            <div class="mb-2 w-full">

                <div class="container my-6 mx-auto px-4 md:px-6">
                    <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                            Master List Management
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="{{URL('master-list')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Master List</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{$model['modelName']}}</span>
                            </div>
                        </li>
                        </ol>
                    </nav>
    

                
                    <div class="my-4 flex justify-between items-center">
                        <button id="add" class="text-sm flex items-center bg-blue-700 py-2 rounded-md pl-2 text-white font-semibold hover:bg-blue-800"  data-tooltip-target="tooltip-top" type="button" data-modal-toggle="create-modal" wire:click.prevent="clear" >
                                Create New Components 
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-1 font-bold mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                  </svg>
                                  
                            </button>                               
                            <div id="tooltip-top" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Create Components
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>  
                    </div>            
            
                    <div class="overflow-auto shadow-2xl sm:rounded-lg">
                            
                        <table  class="w-full text-sm  text-gray-500 dark:text-gray-400 text-center">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-400 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4">
                                    #
                                </th>    
                                <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4">
                                    Material Code
                                </th>
                                <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4">
                                    Material Name
                                </th>
                                <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4">
                                    Quantity
                                </th>
                                <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach($components as $component)
                                <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$index++}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        <div>
                                        @if($show==1 && $action=='edit' &&  $component['componentId'] == $componentsId )
                                            <div>
                                            <select id='model' wire:model='material' class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid rounded transition ease-in-out m-0
                                            focus:text-gray-700 focus:bg-white border-blue-600 focus:outline-none"  aria-label="Default select example" name="type">
                                                @if($materials == null)
                                                    <option value="">--Select Option--</option>
                                                @else
                                                    <option value="">Select Option</option>
                                                    @foreach($materials as $mat)
                                                        <option value="{{$mat['materialId']}}" selected="select">{{$mat['materialCode']}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            </div>
                                        @else
                                            {{$component['materialCode']}}
                                        @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$component['materialDetailed']}}</td>
                                    <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                        {{-- @if($show==1 && $action=='edit' && $component['componentId'] == $componentsId )
                                           <input type="number" wire:model="quantity" id="first_name" class="inputBox text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="0" max="100000">
                                              @error('quantity')<span class="text-red-600">{{$message}}</span>@enderror
                            
                                        @else
                                            {{$component['fixedQtty']}}</td>
                                        @endif --}}
                                        {{$component['fixedQtty']}}
                                     </td>
                                    <td class="flex justify-center text-sm text-black font-medium px-6 py-4 whitespace-nowrap">
                                        <div class=" flex justify-start">
                                             @if($show==1  && $action=='edit' &&  $component['componentId'] == $componentsId )   
                                                <button data-tooltip-placement="bottom" class="flex items-center text-sm p-1.5"  data-tooltip-target="edit-tooltip" type="button"wire:click.prevent="update()">
                                                    <span class="sr-only">Edit List</span> 
                                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-700 transition ease-in-out delay-75 hover:-translate-y-1  hover:scale-110">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                                      </svg>
                                                      
                                                    
                                                </button>      
                                                <button id="dropdownButton" wire:click.prevent="cancel" data-dropdown-toggle="dropdown" class="inline-block text-red-800 transition ease-in-out delay-75 hover:-translate-y-1  hover:scale-110" type="button">
                                                    <span class="sr-only">Open dropdown</span>
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                </button>
                                            @elseif($show==1 && $action=='delete' && $component['componentId'] == $componentsId )
                                                
                                                    <button wire:click.prevent="delete()" data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Yes, I'm sure
                                                    </button>
                                                
                                                <button id="dropdownButton" wire:click.prevent="cancel" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-200 hover:bg-white dark:hover:bg-gray-700 focus:ring-1 focus:outline-none focus:ring-red-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                                                    <span class="sr-only">Open dropdown</span>
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                </button>
                                            @else
                                                <div class="">
                                                    <button  data-tooltip-placement="bottom" class="flex items-center text-sm p-1.5"   type="button" wire:click="select2({{$component['componentId']}})">
                                                    <span class="sr-only">Delete</span>   
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-800 transition ease-in-out delay-75 hover:-translate-y-1  hover:scale-110">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                      </svg>
                                                      
                                                        
                                                    </button>
                                                </div>
                                                <div>
                                                    <button data-tooltip-placement="bottom" class="flex items-center text-sm p-1.5"  data-tooltip-target="edit-tooltip" type="button" wire:click="select({{$component['componentId']}})">
                                                        <span class="sr-only">Edit List</span>  
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-700 transition ease-in-out delay-75 hover:-translate-y-1  hover:scale-110">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                          </svg>
                                                          
                                                        
                                                    </button>
                                        
                                                </div>
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
</section>
