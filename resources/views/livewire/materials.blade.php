<div>
  @include('layouts.header')

    @include('livewire.material-create-form')
    {{-- @include('livewire.material-edit-form') --}}
    <div class="container mx-auto  md:px-12 p-6 bg-transparent">
        <div class="overflow-x-auto relative">
            <div class="container my-1 mx-auto px-4 md:px-6">
                <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Material Management
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
                <div class="flex justify-between items-center">
                  <div class="my-6 flex flex-grow justify-items-stretch items-center space-x-3">
                      <div class="relative flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute ml-3 pointer-events-none outline-none">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        
                        <input wire:model="search2" value="{{old('username')}}" type="text" placeholder="Search" class="pr-3 pl-10 py-2 rounded-full w-64 text-gray-700 focus-within:text-gray-600 focus:text-gray-500 placeholder:text-gray-600 placeholder:font-semibold" name="username" >     
                      </div>
                      
                      <select wire:model="filter1" class="rounded-lg w-60">
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
                  <button id="add" class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center space-x-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-2xl duration-300"  data-tooltip-target="tooltip-top" type="button" data-modal-toggle="create-modal" wire:click.prevent="clear" >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Create New Material </span>
                  </button>                               
                  <div id="tooltip-top" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                          Create Material
                      <div class="tooltip-arrow" data-popper-arrow></div>
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
                          </th><th scope="col" class=" text-sm font-large text-gray-900 px-6 py-4 text-left">
                            Material Deatialed
                          </th>
                          <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                            Vendor Name
                          </th>
                          <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                            Stock Level
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
                      <tbody class=" bg-white">
                        @foreach($materials as $material)
                          <tr class="items-center">
                            <td  class="text-sm text-gray-900 font-medium px-3 py-4 whitespace-nowrap">
                              @if($show==1 && $material['materialId'] == $search1 )
                              <button id="dropdownButton" wire:click.prevent="hide" data-dropdown-toggle="dropdown" class="inline-block text-black hover:bg-gray-200 rounded-full  focus:ring-1 focus:outline-none focus:ring-red-200 dark:focus:ring-gray-700 text-sm p-1.5" type="button">
                                <span class="sr-only">Open dropdown</span>
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                              </button>     
                              @else
                                  {{$index++}}
                              @endif

                            </td>
                            <td  class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                              @if($show==1 && $material['materialId'] == $search1 )
                              <div>
                                <input type="text"  wire:model="editM" class="inputBox bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required  />     
                                @error('editM')<span class="text-red-700">{{$message}}</span>@enderror                  
                              @else
                                  {{$material['materialCode']}}</td>
                              @endif

                            </td> 
                             <td  class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                              @if($show==1 && $material['materialId'] == $search1 )
                                <div>
                                  <input type="text"  wire:model="detailed" class="inputBox bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />     
                                  @error('detailed')<span class="text-red-700">{{$message}}</span>@enderror                  
                                </div>
                              @else
                                  {{$material['materialDetailed']}}</td>
                              @endif
                            </td>
                            <td  class="text-sm text-gray-700  font-medium px-6 py-4 whitespace-nowrap">
                              @if($show==1 && $material['materialId'] == $search1 )
                              <div>
                               <select id='vendor' wire:model='editV' class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid rounded transition ease-in-out m-0
                                focus:text-gray-700 focus:bg-white border-blue-600 focus:outline-none"  aria-label="Default select example" name="type" required>
                                    @if($vendors==null)
                                        <option value="">--Select Option--</option>
                                    @else
                                        @foreach($vendors as $sta)
                                          @if($editV = $sta['vendorId'] )
                                            <option value="{{$sta['vendorId']}}" selected>{{$sta['vendorName']}} </option>
                                          @else
                                            <option value="{{$sta['vendorId']}}">{{$sta['vendorName']}}</option>
                                          @endif    
                                        @endforeach
                                    @endif
                                </select>  
                                @error('editV')<span class="text-red-700">{{$message}}</span>@enderror                  

                              </div>
                              @else
                                {{$material['vendorName']}}</td>
                              @endif
                            <td class="text-sm text-gray-700  font-medium px-6 py-4 whitespace-nowrap">
                              @if($show==1 && $material['materialId'] == $search1 )  
                              <div>                                
                                <input type="number" wire:model="editT" name="threshold" class="inputBox w-20 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required min="1" max="99999">   
                                @error('editT')<span class="text-red-700">{{$message}}</span>@enderror                  

                              </div>
                              @else
                                {{$material['threshold']}}
                              @endif
                            </td>
                            <td  class="text-sm text-gray-600  font-small px-6 py-4 whitespace-nowrap">
                                {{$material['materialCreate']}}
                            </td>
                            <td  class="text-sm text-gray-500 font-small px-6 py-4 whitespace-nowrap">
                                {{\Carbon\Carbon::parse($material['materialUpdate'])->diffForHumans()}}    
                            </td>
                            <td class="text-sm text-gray-500 font-medium px-6 py-4 whitespace-nowrap">
                                @if($show== 1 && $material['materialId'] == $search1 )
                                  @if($select==1)
                                  <div>
                                    <label for="green-toggle" class="inline-flex relative items-center mr-5 cursor-pointer">
                                        <input type="checkbox" wire:model="select" value="" id="green-toggle" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>                    
                                    </label>
                                  </div>    
                                  @else
                                  <div>
                                        <label for="red-toggle" class="inline-flex relative items-center mr-5 cursor-pointer">
                                            <input type="checkbox" wire:model="select" value="" id="red-toggle" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-red-300 dark:peer-focus:ring-red-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-600"></div>
                                    </label>
                                  </div>
                                  @endif      
                              @else   
                                  @if($material['isActive']==1)
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
                             <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                  @if($show==1 && $material['materialId'] == $search1 ) 
                                      <button  data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom" wire:click="update" class=" flex items-center p-2 text-base font-normal py-2 px-4 ">                                
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-700 transition ease-in-out delay-75 hover:-translate-y-1  hover:scale-110">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                      </button>                                      
                                  @else
                                      <button data-modal-toggle="edit-modal" data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom" wire:click="select({{$material['materialId']}})" class=" flex items-center p-2 text-base font-normal py-2 px-4  text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">                                
                                      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        <span class="">Edit</span>
                                      </button>
                                   @endif
                              </td>
                          </tr> 
                        @endforeach
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
        <div class="flex pl-5 mt-2 font-semibold">
            {{$materials->links()}}
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
