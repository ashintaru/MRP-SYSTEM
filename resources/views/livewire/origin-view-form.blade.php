
<div wire:ignore.self id="view-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Vendor Information Form
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="view-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div  class="flex flex-row justify-around p-5">
                <div class="w-1/2 md:w-full text-gray-700 dark:text-gray-200 space-y-5" >
                    <div class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">
                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 ionicon text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" viewBox="0 0 512 512"><title>Logo Dropbox</title><path  d="M248 64C146.39 64 64 146.39 64 248s82.39 184 184 184 184-82.39 184-184S349.61 64 248 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M220 220h32v116"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M208 340h88"/><path d="M248 130a26 26 0 1026 26 26 26 0 00-26-26z"/></svg>
                        <p class="text-lg">Vendor Information</p>
                    </div>
                    <div wire:key ="view-form-{{$vendorCode}}" class="p-3 py-2 px-4 text-sm font-medium text-start text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">
                        <ol class="flex ml-3 whitespace-nowrap">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 ionicon text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" viewBox="0 0 512 512"><title>Logo Dropbox</title><path d="M190.06 414l163.12-139.78a24 24 0 000-36.44L190.06 98c-15.57-13.34-39.62-2.28-39.62 18.22v279.6c0 20.5 24.05 31.56 39.62 18.18z"/></svg>
                            <li class="flex-1 ml-1 whitespace-nowrap">Vendor Name : {{$vendorName}} </li>
                            <p wire:model="vendorName" class=" text-sm"> </p>
                        </ol>
                        <ol class="flex ml-3 whitespace-nowrap">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 ionicon text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" viewBox="0 0 512 512"><title>Logo Dropbox</title><path d="M190.06 414l163.12-139.78a24 24 0 000-36.44L190.06 98c-15.57-13.34-39.62-2.28-39.62 18.22v279.6c0 20.5 24.05 31.56 39.62 18.18z"/></svg>
                            <li class="flex-1 ml-1 whitespace-nowrap">Vendor Lot Size : {{$lotSize}}</li>
                        </ol>
                        <ol class="flex ml-3 whitespace-nowrap">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 ionicon text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" viewBox="0 0 512 512"><title>Logo Dropbox</title><path d="M190.06 414l163.12-139.78a24 24 0 000-36.44L190.06 98c-15.57-13.34-39.62-2.28-39.62 18.22v279.6c0 20.5 24.05 31.56 39.62 18.18z"/></svg>
                            <li class="flex-1 ml-1 whitespace-nowrap">Vendor Lead Time : {{$leadTime}}</li>
                        </ol>
                    </div>
                </div>
                <div class="overflow-y-auto p-3 py-1 text-sm text-gray-700 dark:text-gray-200 w-1/2 md:w-full space-y-5 ">
                    <div class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">                      
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 ionicon text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" viewBox="0 0 512 512"><title>File Tray Stacked</title><path d="M48 336v96a48.14 48.14 0 0048 48h320a48.14 48.14 0 0048-48v-96" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M48 336h144M320 336h144M192 336a64 64 0 00128 0"/><path d="M384 32H128c-26 0-43 14-48 40L48 192v96a48.14 48.14 0 0048 48h320a48.14 48.14 0 0048-48v-96L432 72c-5-27-23-40-48-40z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M48 192h144M320 192h144M192 192a64 64 0 00128 0"/></svg>
                        <p class="text-lg">Listed Material's</p>
                    </div>
                    <div class="p-3 inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700  md:w-full ">
                        <div class=" md:w-full overflow-y-hidden h-40 hover:overflow-y-scroll " aria-labelledby="dropdownDefault ">
                            @if(count($array) != 0)
                                @foreach($array as $a)
                                    <div class="flex">                      
                                        <ol class="flex ml-3 whitespace-nowrap">
                                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 ionicon text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" viewBox="0 0 512 512"><title>Logo Dropbox</title><path d="M190.06 414l163.12-139.78a24 24 0 000-36.44L190.06 98c-15.57-13.34-39.62-2.28-39.62 18.22v279.6c0 20.5 24.05 31.56 39.62 18.18z"/></svg>
                                            <li class="flex-1 ml-1 whitespace-nowrap">{{$a->materialCode}}</li>
                                        </ol>
                                    </div>
                                @endforeach
                            @else
                                <div class="flex">                      
                                    <ol class="flex ml-3 whitespace-nowrap">
                                        <li class="flex-1 ml-1 whitespace-nowrap">NO MATERIALS</li>
                                    </ol>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button data-modal-toggle="view-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Close</button>
            </div>
        </div>
    </div>
</div>
