@extends('layouts.app')
@extends('layouts.header')
@section('container')
<body>
  <!--Grid Form-->
  <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">

        <div class="p-3">
          <!--Header Section Starts Here-->
          <header class=" bg-gray-600  text-white  font-bold rounded"> 
              <div class="flex justify-between">
                  <div class="p-1 mx-3 inline-flex items-center">
                      <h1 class="p-2">Account Management</h1>
                  </div>
                  <div class="p-1 flex flex-row items-center">
                    <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">
                      Create New Account 
                      <i class="fa fa-plus"></i>
                    </button>                    
                 </div>
              </div>
          </header>
          <!--/Header-->
        </div>

        <div class="p-3">
          <div class="bg-blue-200 text-teal-900 font-bold py-2 px-4 rounded-l">
            <div class="flex flex-row justify items-center">
              <div>
                <h2 class=" text-red-500 font-semibold">Status :</h2>
              </div>
              <div>
                {{-- @if(session('status')->has())
                  @if(session('status')==true )
                    <span class="text-red-700">
                      {{session('message')}}
                    </span>
                  @else  
                    <span class="text-green-700">
                      {{session('message')}}
                    </span>
                  @endif
                @endif --}}
              </div>
              @if($errors->any())
              @foreach($errors->all() as $err)
                <span>**{{$err}}**  </span>
              @endforeach
            @endif      
            </div>
          </div>
        </div>
    <div class="container my-12 mx-auto px-4 md:px-12">
      <div class="flex flex-wrap -mx-1 lg:-mx-4">    
        <div class="p-3">
            <table class="table-responsive w-full rounded">
                <thead>
                  <tr>
                    <th class="border w-1/4 px-4 py-2">UserName</th>
                    <th class="border w-1/6 px-4 py-2">Password</th>
                    <th class="border w-1/6 px-4 py-2">Account Created</th>
                    <th class="border w-1/6 px-4 py-2">Account Updated</th>
                    <th class="border w-1/7 px-4 py-2">Account Type	</th>
                    <th class="border w-1/7 px-4 py-2">First Name</th>
                    <th class="border w-1/7 px-4 py-2">Midle Name</th>
                    <th class="border w-1/7 px-4 py-2">Last Name</th>
                    <th class="border w-1/5 px-4 py-2">Acount Status</th>
                    <th class="border w-1/5 px-4 py-2">Action</th>
                  </tr>
                </thead>
                <tbody class="">
                    @foreach($accounts as $acc)
                    <tr class="border-b hover:bg-yellow-200">
                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$acc->accUserName}}</td>
                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap" >{{$acc->accPassWord}}</td>
                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$acc->personCreated}}</td>
                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$acc->personUpdated}}</td>
                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                            @if($acc->typeId==0)
                              <p class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">Admin</p>
                            @else
                              <p class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full">User</p>
                            @endif
                        </td>
                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$acc->personFirstName}}</td>
                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$acc->personMidleName}}</td>
                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$acc->personLastName}}</td>
                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                          @if($acc->isActive==1)
                            <i class="bg-green-500 hover:bg-green-900 text-white font-bold py-2 px-2 rounded-full fas fa-check"></i>                    
                          @elseif($acc->isActive==0)
                            <i class="fas fa-times bg-red-500 hover:bg-red-900 text-white font-bold py-2 px-3 rounded-full"></i>
                          @endif
                        </td>
                        
                        {{-- <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">{{$acc->status}}</td> --}}
                        
                        <td class="text-sm text-black font-medium px-6 py-4 whitespace-nowrap">
                          <a class="bg-blue-900 cursor-pointer rounded p-1 mx-1 text-white"
                          href="{{ route('modify', ['key1' => $acc->accId ,'key2' => $acc->personId] )}}" >
                          Edit
                          <i class="fas fa-edit"></i>
                          </a>
                          {{-- <button class=" hover:bg-blue-300"><a href="{{ route('modify', ['key1' => $acc->accId ,'key2' => $acc->personId] )}}" >Modify </a></button> --}}
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
        
        @if($accounts!=null)
        <div class="bg-gray-300 font-bold py-2 px-4 rounded-lshadow-md ">
          {{$accounts->links()}} 
        <div>
        @else
        <div class=" bg-white rounded-xl shadow-md ">
          
        <div>
        @endif
     </div>
</div>
<!--/Grid Form-->   
      {{-- </div>
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-7xl">
      <div class="p-8">
        <div class="flex flex-row justify items-center">
          <div>
            <h2 class=" text-red-500 font-semibold">Status :</h2>
          </div>
          <div>
            @if(session('status') && session('message'))
              @if(session('status')==true )
                <span class="text-red-700">
                  {{session('message')}}
                </span>
              @else  
                <span class="text-green-700">
                  {{session('message')}}
                </span>
              @endif
            @endif
          </div>
          @if($errors->any())
          @foreach($errors->all() as $err)
            <span>**{{$err}}**  </span>
          @endforeach
        @endif      
        </div>
      </div>
    </div> --}}
    
<!-- Modal toggle -->

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="py-6 px-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Create an Account</h3>
                <form class="space-y-6" action = "{{URL('saveNewAcc')}}" method="POST">
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">the Username</label>
                        <input type="text" value="{{ old('username') }}" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                    </div>
                    <div class="flex justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" value="" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required="">
                            </div>
                            <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                        </div>
                        <a href="#" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Lost Password?</a>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Not registered? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 

    <div class="absolute inset-0 hidden justify-center items-center h-full" id="overlay">
      <div class="bg-gray-200 max-w-lg py-2 px-3 rounded shadow-xl text-gray-800">
          <div class="flex justify-between items-center">
              <h4 class="text-lg font-bold">Create New Account</h4>
              <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
              </svg>
          </div>

          <div class="p-8">
            <form action = "{{URL('saveNewAcc')}}" method="POST">
              @csrf
              <input hidden value="{{ URL::current() }}" name="url_P" >
              {{-- {!! Form::hidden('redirects_to', URL::previous()) !!} --}}
              <div class="grid grid-flow-row-dense grid-cols-4 grid-rows-4 items-center place-content-center space-y-5">
                    <div class="col-span-4"><span class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">Account Info</span></div>
                    <div class="col-span-2">
                      <p> Username: </p>
                    </div> 
                    <div class="col-span-2">
                        <input class="border-2 border-blue-500" type="text" value="{{ old('username') }}" name="username">
                    </div>      
                    <div class="col-span-2">
                      <p>  Password: </p>
                    </div> 
                    <div class="col-span-2">
                        <input class="border-2 border-blue-500" type="text" value="{{ old('password') }}" name="password">
                    </div>      
                    <div class="col-span-4"><span class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full">Personal Info</span></div>
                    <div class="col-span-2">
                      <p>First name: </p>
                    </div> 
                    <div class="col-span-2">
                        <input class="border-2 border-blue-500" type="text" value="{{ old('fname') }}"  name="fname">
                    </div>      
                    <div class="col-span-2">
                      <p> Middle name: </p>
                    </div> 
                    <div class="col-span-2">
                        <input class="border-2 border-blue-500" type="text" value="{{ old('mname') }}"  name="mname">
                    </div>      
                    <div class="col-span-2">
                      <p> Last name: </p>
                    </div> 
                    <div class="col-span-2">
                        <input class="border-2 border-blue-500 " type="text" value="{{ old('lname') }}"  name="lname">
                    </div>
                    <div class="col-span-4"><span class="bg-orange-500 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded-full">Account Type</span></div>
                    <div class="col-span-2">
                      <p> Account Type: </p>
                    </div> 
                    <div class="col-span-2">`
                        <select name="type" class=" block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="type">
                        @foreach($types as $type)
                          <option value="{{$type['typeId']}}">{{$type['typeName']}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-span-4">
                      <button type="submit" class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
                    </div>
                  </div>
            </div>
          </div>
        </form>
      </div>
  </div>

<script>
  window.addEventListener('DOMContentLoaded', () =>{
      const overlay = document.querySelector('#overlay')
      const delBtn = document.querySelector('#delete-btn')
      const closeBtn = document.querySelector('#close-modal')

      const toggleModal = () => {
          overlay.classList.toggle('hidden')
          overlay.classList.toggle('flex')
      }

      delBtn.addEventListener('click', toggleModal)

      closeBtn.addEventListener('click', toggleModal)
  })

</script>
@endsection
                    {{-- <tr>
                        <td class="border px-4 py-2">Micheal Clarke</td>
                        <td class="border px-4 py-2">Sydney</td>
                        <td class="border px-4 py-2">MS</td>
                        <td class="border px-4 py-2">900 $</td>
                        <td class="border px-4 py-2">
                            <i class="fas fa-check text-green-500 mx-2"></i>
                        </td>
                        <td class="border px-4 py-2">
                            <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-eye"></i></a>
                            <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-edit"></i></a>
                            <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                    <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                     --}}
