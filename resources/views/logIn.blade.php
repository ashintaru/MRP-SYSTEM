@extends('layouts.app')
@section('container')
<style>
  
 body{
        background: #e96060;
      }
</style>
<body class="h-screen font-sans login bg-cover">           
  <div class="container mx-auto h-full flex flex-1 justify-center items-center">
    <div class="w-full max-w-lg">
      <div class="leading-loose">
        <form method="POST" action="{{URL('/')}}" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
          @csrf
          <p class="text-gray-800  text-center text-lg font-bold">Login</p>
          <div class="">
            <label class="block text-sm text-gray-00" for="username">Username</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="username" type="text" required=""  placeholder="Username" value="{{old('username')}}" name="username" aria-label="username">
          </div>
          <div class="mt-2">
            <label class="block text-sm text-gray-600" for="password">Password</label>
            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="password" type="password" placeholder="Password"  value="{{old('password')}}" name="password" required=""  aria-label="password">
          </div>
   <div class="items-center place-content-center">
     <span class="text-red-400">{{session('message')}}</span>
   </div>

          <div class="mt-4 items-center justify-between">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Login</button>                     
          </div>
        </form>
  
      </div>
    </div>
  </div>
  </body>
  <script>
    $(document).on("click", "button", function(){
    $.post('/', function(data){
        $("body").html(data);
    });       
  });
  </script>


@endsection