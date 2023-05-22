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
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit a Material</h3>
                <form class="space-y-6">
                    <div>
                        <label for="material" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Material Name</label>
                        <input type="text" wire:model="material" name="material" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required required min="3">
                        @error('material')<span class="text-red-700">{{$message}}</span>@enderror                  
                    </div>
                    <div>
                        <label for="vendor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vendor Name</label>
                         <select id='vendor' wire:model='vendor' class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid rounded transition ease-in-out m-0
                        focus:text-gray-700 focus:bg-white border-blue-600 focus:outline-none"  aria-label="Default select example" name="type" required>
                            @if($vendors==null)
                                <option value="">--Select Option--</option>
                            @else
                                <option value="">Select Option</option>
                            @foreach($vendors as $sta)
                                    <option value="{{$sta['vendorId']}}">{{$sta['vendorName']}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('vendor')<span class="text-red-600">{{$message}}</span>@enderror
                    </div>
                    <div>
                        <label for="threshold" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">threshold</label>
                        <input type="number" wire:model="threshold" name="threshold" class="inputBox bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required required min="1" max="99999">
                        @error('threshold')<span class="text-red-700">{{$message}}</span>@enderror                  
                    </div>

                    <button type="submit" wire:click="submit()"  class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
               </form>
            </div>
        </div>
    </div>
</div> 
<script>
    window.addEventListener('DOMContentLoaded', () =>{
        var count = document.querySelectorAll('input.inputBox').length;
        var inputBox = document.getElementsByClassName("inputBox");

            var invalidChars = [
            "-",
            "+",
            "e",
            "E",
            ];
        for(let i = 0; i < count ; i++){
            inputBox[i].addEventListener("keydown", function(e) {
            if (invalidChars.includes(e.key)) {
                e.preventDefault();
            }
            });
        }
    })
</script>