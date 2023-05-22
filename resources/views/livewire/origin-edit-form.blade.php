
<div wire:ignore.self id="edit-modal" name='model' tabindex="-1" aria-hidden="true" class=" modal1 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button id="closed" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="edit-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                {{-- wire:key ="edit-form-{{$vendorCode}}" --}}
                <div  class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white"> <i class="fa fa-plus-square-o" aria-hidden="true"></i> Edit Form</h3>
                    <form class="space-y-6">
                        <div>
                            <label for="Title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vendor Name</label>
                            <input type="text" wire:model="vendorName" id="vendorname" class="inputBox text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            @error('vendorName')<span class="text-red-600">{{$message}}</span>@enderror
                        </div>
                        <div class="flex justify-around">
                            <div>
                                <label for="number" wire:model="newQ" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vendor Lead Time</label>
                                <input type="number" wire:model="leadTime" id="number" class="inputBox text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="1" max="12">
                                @error('leadTime')<span class="text-red-600">{{$message}}</span>@enderror
                            </div>
                            <div>
                                <label for="lead" wire:model="newQ" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vendor Lot Size</label>
                                <input type="number" wire:model="lotSize" id="lead" class="inputBox text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="1" max="9999">
                                @error('lotSize')<span class="text-red-600">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="justify-center">
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
                        <button type="submit" wire:click.prevent="update()"  class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> 
                        <div class="flex items-center justify-center ">
                                <i class="mr-2 fas fa-plus-square"></i> 
                                <p> Create </p>
                                <div class="" wire:loading wire:target="update">                            
                                    <div class="" role="status">
                                        <svg class="mr-3 inline w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                        </svg>
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>    
                        </div>
                        </button>       
                    </form>
                </div>
            </div>
        </div>
    </div> 
