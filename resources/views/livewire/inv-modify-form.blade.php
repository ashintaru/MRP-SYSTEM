<!-- Main modal -->
<div wire:ignore.self id="authentication-modal" name='model' tabindex="-1" aria-hidden="true" class="divmodal modal1 hidden overflow-y-auto  overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="py-6 px-6 lg:px-8">
                <h3 class="mb-4 text-xl border-t-amber-300 font-medium bg text-gray-900 dark:text-white">Modify Material Quantity Form</h3>
                <form class="space-y-6">
                    <div>
                        <input type="hidden" id="materialid" wire:model="invIds">
                        <label for="Material Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Materiak Code</label>
                         <input type="text" id="Material Name" class="text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white  dark:focus:ring-blue-500 dark:focus:border-blue-500" value ="{{$modelName}}" wire:model="modelName" disabled = "true">
                        <p class="flex items-center text-sm font-light text-gray-500 dark:text-gray-400">Want to Modify it?<button data-popover-target="popover-description" data-popover-placement="bottom-end" type="button"><svg class="ml-2 w-4 h-4 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button></p>
                        <div data-popover="" id="popover-description" role="tooltip" class="inline-block absolute invisible z-10 w-72 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 3110.4px, 0px);">
                        <div class="p-3 space-y-2">
                            <h3 class="font-semibold text-gray-900 dark:text-white">Modify this Material</h3>
                            <p>Kindly traverse the menu and find the BOM management or Master List and click the <strong> Material Management</strong>.</p>
                            <a href="#" class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700">Read more <svg class="ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></a>
                        </div>
                        <div data-popper-arrow="" style="position: absolute; left: 0px; transform: translate3d(0px, 0px, 0px);"></div>
                        </div>
                    </div>
                    <div>
                        <label for="" class=" text-center block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Previous Quantity</label>
                        <input type="number" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$prevQ}}" disabled >
                        <p class="flex items-center text-sm font-light text-gray-500 dark:text-gray-400">What will happend on the Past data?<button data-popover-target="popover-description1" data-popover-placement="bottom-end" type="button"><svg class="ml-2 w-4 h-4 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button></p>
                        <div data-popover="" id="popover-description1" role="tooltip" class="inline-block absolute invisible z-10 w-72 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 3110.4px, 0px);">
                        <div class="p-3 space-y-2">
                            <h3 class="font-semibold text-gray-900 dark:text-white">The Past Data</h3>
                            <p>After submiting the new Data the past data will be no longer be saved on the database.</p>
                            <a href="#" class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700">Read more <svg class="ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></a>
                        </div>
                        <div data-popper-arrow="" style="position: absolute; left: 0px; transform: translate3d(0px, 0px, 0px);"></div>
                        </div>
                    </div>
                    <div>
                        <label for="" wire:model="newQ" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">New Quantity</label>
                        <input type="number" wire:model="newQuantity" id="first_name" class="inputBox text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="0" max="100000">
                        <div> @error('newQuantity')<span class="text-red-600">{{$message}}</span>@enderror </div>


                        <div>
                            <span class="text-xs text-gray-600" >Last Upadate on {{$date}} </span>
                        </div>
                    </div>
                    <div>
                        <button type="submit" wire:click.prevent="modify"  class=" w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modify</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
