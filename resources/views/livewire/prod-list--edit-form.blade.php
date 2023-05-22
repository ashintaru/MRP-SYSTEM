<!-- Main modal -->
<div wire:ignore.self id="edit-modal" tabindex="-1" aria-hidden="true" class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="edit-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="py-6 px-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit a Production List</h3>
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
                        <input type="date" wire:model="finalDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" >
                        @error('finalDate')<span class="text-red-700">{{$message}}</span>@enderror                  
                    </div>
                    <div>
                        <label for="finalDate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">List Status</label>
                            @if($select==1)
                                <label for="green-toggle" class="inline-flex relative items-center mr-5 cursor-pointer">
                                    <input type="checkbox" wire:model="select" value="" id="green-toggle" class="sr-only peer" checked>
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>                    
                                <span class="ml-3 text-sm font-medium text-green-900 dark:text-green-100 ">Active List</span>
                                </label>    
                            @else
                                <label for="red-toggle" class="inline-flex relative items-center mr-5 cursor-pointer">
                                    <input type="checkbox" wire:model="select" value="" id="red-toggle" class="sr-only peer" checked>
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-red-300 dark:peer-focus:ring-red-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-600"></div>
                                <span class="ml-3 text-sm font-medium text-red-900 dark:text-red-300">De - active List</span>                            
                              </label>
                            @endif
                    </div>
                    <button type="submit" wire:click.prevent="update()"  class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                    <div>
                        @if(session()->has('message'))
                            <span class="bg-green-500 text-white">
                                {{session('message')}}                        
                            </span>
                        @endif
                    </div>

                </form>
            </div>
        </div>
    </div>
</div> 
