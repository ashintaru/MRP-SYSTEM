<div>
  <div class="flex flex-col items-center justify-center h-screen w-screen bg-cover bg-center" style="background-image: url('image/bg.jpg')">
    <div class="relative flex items-center justify-center">
      <svg version="1.1" id="Layer_1" class="fixed w-36 h-20 mt-3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
      viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
   <circle style="fill:#DB2B42;" cx="256" cy="256" r="256"/>
   <g>
     <path style="fill:#FFFFFF;" d="M256,489.304C127.36,489.304,22.704,384.648,22.704,256C22.704,127.36,127.36,22.704,256,22.704
       S489.296,127.36,489.296,256C489.296,384.648,384.64,489.304,256,489.304z M256,30.704C131.776,30.704,30.704,131.768,30.704,256
       S131.776,481.304,256,481.304S481.296,380.232,481.296,256S380.224,30.704,256,30.704z"/>
     <circle style="fill:#FFFFFF;" cx="256" cy="173.536" r="57.192"/>
   </g>
   <g>
     <path style="fill:#2D2D2D;" d="M253.296,363.656L198.04,243.864c0,0-57.96,0.776-57.96,54.096s0,65.688,0,65.688
       S253.68,363.656,253.296,363.656z"/>
     <path style="fill:#2D2D2D;" d="M258.704,363.656l55.256-119.792c0,0,57.96,0.776,57.96,54.096s0,65.688,0,65.688
       S258.32,363.656,258.704,363.656z"/>
     <polygon style="fill:#2D2D2D;" points="256,243.864 216.2,243.864 256,331.968 295.8,243.864 	"/>
   </g>
   <g>
   </g>
   <g>
   </g>
   <g>
   </g>
   <g>
   </g>
   <g>
   </g>
   <g>
   </g>
   <g>
   </g>
   <g>
   </g>
   <g>
   </g>
   <g>
   </g>
   <g>
   </g>
   <g>
   </g>
   <g>
   </g>
   <g>
   </g>
   <g>
   </g>
   </svg>
   
    </div>
    <div class=" bg-white py-8 px-6 shadow-2xl rounded-md h-82 w-1/4 flex flex-col items-center space-y-5 mt-4">
      <form  class="space-y-5">
          <div class="relative">
              <h2 class="flex justify-center items-center text-2xl font-['Helvetica'] font-semibold mt-5">YMPH</h2>
          </div>

          <div class="relative mt-2 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute ml-3 pointer-events-none">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
            </svg>
            <input wire:model="username" value="{{old('username')}}" type="text" placeholder="Username" class="pr-3 pl-10 py-2 rounded-full w-64 text-gray-700 focus-within:text-gray-600" name="username" >     
          </div>
          @error('username')<span class="text-red-600 ml-4 text-xs font-semibold">{{$message}}</span>@enderror 
          <div class="relative mt-2 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute ml-3 pointer-events-none">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
            </svg>
            
            <input wire:model="password" value="{{old('password')}}" type="password" placeholder="Password" class="pr-3 pl-10 py-2 rounded-full w-64 text-gray-700 focus-within:text-gray-600" name="password">      
          </div>
          @error('password')<span class=" text-red-600 ml-4 text-xs font-semibold">{{$message}}</span>@enderror
          
          <div class="items-center place-content-center">
            <span class="text-red-400">{{session('message')}}</span>
          </div>
          <div class="mt-4 items-center justify-between">
            <button wire:click.prevent="submit()" class="w-64 rounded-full bg-red-800 p-2 text-white font-[Helvetica] font-semibold hover:bg-red-600 duration-300" type="submit">Log In</button>   
          </div>
      </form>
    </div>
  </div>
</div>
{{-- <script src="https://cdn.tailwindcss.com"></script> --}}

{{-- <div class="flex flex-col items-center justify-center h-screen w-screen bg-cover bg-center" style="background-image: url('image/yamaha-bg.png')">
  
  <div class="relative flex items-center justify-center">
  </div>

  <form class="bg-white py-8 px-6 shadow-2xl rounded-md h-80 w-1/4 flex flex-col items-center space-y-5 mt-4">
    
      
      <div class="relative">
          <h2 class="flex justify-center items-center text-3xl font-['Helvetica Neue'] font-semibold mt-8">YAMAHA PH</h2>
      </div>

      <div class="relative flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute ml-3 pointer-events-none outline-none">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
        </svg>
        
        <input wire:model="search2" value="{{old('username')}}" type="text" placeholder="Username" class="pr-3 pl-10 py-2 rounded-full w-64 text-gray-700 focus-within:text-gray-600 focus:text-gray-500 placeholder:text-gray-600 placeholder:font-semibold" name="username" >     
      </div>

      <div class="relative flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute ml-3 pointer-events-none outline-none">
          <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
        </svg>
        
        <input  value="{{old('password')}}" type="password" placeholder="Password" class="pr-3 pl-10 py-2 rounded-full w-64 text-gray-700 focus-within:text-gray-600 focus:text-gray-500 placeholder:text-gray-600 placeholder:font-semibold" name="password" >     
      </div>

      <button
          class="w-64 flex justify-center items-center bg-red-800 text-white mt-2 py-2 px-4 border border-transparent rounded-full shadow-sm text-sm font-semibold focus:outline-none focus:ring-2 focus:rinf-offset-2 focus:ring-red-500 hover:bg-red-700 duration-300">Log In</button>
  </form>
</div> --}}