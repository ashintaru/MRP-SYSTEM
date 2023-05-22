<!-- Main modal -->
<div wire:ignore.self id="authentication-modal1" tabindex="-1" aria-hidden="true" class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal1">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="py-6 px-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit a Production</h3>
                <form class="space-y-6">
                    <div>
                        <label for="Title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Model</label>
                         <select id='model' wire:model='selectModel' class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid rounded transition ease-in-out m-0
                        focus:text-gray-700 focus:bg-white border-blue-600 focus:outline-none"  aria-label="Default select example" name="type">
                            @if($list1==null)
                                <option value="">--Select Option--</option>
                            @else
                                <option value="">Select Option</option>
                                @foreach($list1 as $sta)
                                    <option value="{{$sta->modelId}}">{{$sta->modelName}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('selectModel')<span class="text-red-600">{{$message}}</span>@enderror
                    </div>
                    <div>
                        <label for="memo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Production List Memo</label>
                        <div class="flex justify-between gap-x-4">
                            <button wire:click.prevent ="add" class="hover:border-black hover:bg-red-600 hover:text-white text-lg w-1/3">+</button>
                            <input type="number" wire:model="num" min="0" max="9999" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 dark:bg-gray-600 dark:border-gray-500 text-center text-lg dark:placeholder-gray-400 dark:text-white inputBox" placeholder="" >
                            <button wire:click.prevent="minus" class="hover:bg-blue-600 hover:text-white w-1/3 text-lg">-</button>
                        </div>
                        @error('num')<span class="text-red-700">{{$message}}</span>@enderror                  
                    </div>
                    <div>
                        <label for="finalDate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Final Date</label>
                            <input type="date" wire:model="finalDate" value="{{ old('username') }}" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" >
                        @error('finalDate')<span class="text-red-700">{{$message}}</span>@enderror                  
                    </div>
                    <button type="submit" wire:click.prevent="update"  class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                    <div>
                        @if(session()->has('message'))
                            <span class="text-green-500">
                                {{session('message')}}                        
                            </span>
                        @endif
                        @if(session()->has('info'))
                        <span class="text-blue-500">
                            {{session('info')}}                        
                        </span>
                    @endif
                    </div>

                </form>
            </div>
        </div>
    </div>
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
      });
</script>