<div>
    @include('layouts.header')
    {{-- @include('livewire.material-edit-form') --}}
    <div class="container mx-auto  md:px-12 p-6 bg-transparent">
        <div class="overflow-x-auto relative">
            <div class="container my-1 mx-auto px-4 md:px-6">
                <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Inventory Management
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                        <a href="{{URL('inventory')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"> Material</span>
                        </a>
                      </div>
                    </li>
                    <li aria-current="page">
                      <div class="flex items-center">
                      <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                      <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"> Logs</span>
                      </div>
                  </li >
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
                        <option value="1">Modify Material</option>
                        <option value="0">Add Material</option>
                      </select>

                      <select wire:model="filter1" class="rounded-lg w-40">
                        <option value="ASC" class="">ASCENDING</option>
                        <option value="DESC">DESCENDING</option>
                      </select>
              
  
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
                          Remark 
                        </th>
                        <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                          Date 
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
                              <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap" >{{$li->logId}}</td>
                              <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{$li->materialCode}}
                              </td>
                              <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                  {{$li->value}}
                              </td>
                              <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{$li->remark}}
                              </td>
                              <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $li->date)->format(' F d Y')}}</td>
                              <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                               @if($li->action==1)
                                <div class="flex items-center">
                                  <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> 
                                      <span class=" text-gray-900 dark:text-gray-800">Modify Material</span> 
                                      </div>
                                  @else
                                  <div class="flex items-center">
                                      <div class="h-2.5 w-2.5 rounded-full bg-red-400 mr-2"></div> 
                                          <span class=" text-gray-900 dark:text-gray-800">add Material</span> 
                                  </div>
                                  @endif
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
            </div>
        </div>
        <div class="flex pl-5 mt-2 font-semibold">
            {{-- {{$list->links()}} --}}
        </div>
</div>
 