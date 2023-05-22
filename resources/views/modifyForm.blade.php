@extends('layouts.app')
@extends('layouts.header')
@section('container')
<body> 
  <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">

      {{-- <div class="w-full md:w-6/8 px-3 mb-6 md:mb-0">
        <div class="w-full md:w-6/8 px-3 mb-6 md:mb-0">
          @if(session('message'))
          <div class="flex items-center mb-2 bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{session('message')}}</p>
           @endif
          @if($errors->any())
           @foreach($errors->all() as $err)
            <span>**{{$err}}**  </span>
          @endforeach
         @endif     
        </div>
        </div>
      </div> --}}
      <div class="p-3">
        <!--Header Section Starts Here-->
        <header class=" bg-teal-200  text-teal-900 font-bold rounded"> 
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <h1 class="p-2">Modify Account</h1>
                </div>
            </div>
        </header>
        <!--/Header-->
      </div>
      
      <div class="p=3">
        @if(session('message'))
        <div class="flex items-center mb-2 bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
          <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
          <p>{{session('message')}}</p>
        </div>

         @endif
          @if($errors->any())
            @foreach($errors->all() as $err)
            <span>**{{$err}}**  </span>
          @endforeach
          @endif     
      </div>  

      <div class="p-3">
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
          <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
              <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                  Modify Form
              </div>
              <div class="">
                <form action="{{  url('modify-acc/'.$acc[0]->accId.'/'.$acc[0]->personId)  }}" method="POST">
                  @csrf
                  @method('PUT')              
                        <div class="flex flex-wrap -mx-3 mb-6">
                          <div class="w-full  px-3 mb-6 md:mb-0">
                              <p class="block uppercase tracking-wide bg-blue-500  text-white font-bold py-2 px-4 rounded-full font-dark mb-1">
                                  Account Information
                              </p>
                           </div>
                        </div>

                       <div class="flex flex-wrap -mx-3 mb-6">
                          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                              <label class="block uppercase tracking-wide text-black text-xs font-dark mb-1"
                                     for="grid-first-name">
                                  Username
                              </label>
                              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" type="text" value="{{ $acc[0]->accUserName }}" name="username" id="grid-user-name">
                           </div>

                           <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                              <label class="block uppercase tracking-wide text-black text-xs font-dark mb-1"
                                     for="grid-first-name">
                                  PassWord
                              </label>
                              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" border-blue-500" type="text" value="{{ $acc[0]->accPassWord }}" name="password" id="grid-pass-word">
                           </div>
                      </div>

                      <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <p class="block uppercase tracking-wide bg-green-500  text-white font-bold py-2 px-4 rounded-full font-dark mb-1">
                                Personal Information
                            </p>
                         </div>
                      </div>

                      {{-- <div class="flex flex-wrap -mx-3 mb-6">
                          <div class="w-full px-3">
                              <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                     for="grid-password">
                                  Password
                              </label>
                              <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                     id="grid-password" type="password" placeholder="******************">
                              <p class="text-grey-dark text-xs italic">Make it as long and as crazy as
                                  you'd like</p>
                          </div>
                      </div> --}}
              
                      <div class="flex flex-wrap -mx-3 mb-2">
                          <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                              <label class="block uppercase tracking-wide  text-black text-xs font-dark mb-1"
                                     for="grid-city">
                                  First Name
                              </label>
                              <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white border-blue-500" type="text" value="{{ $acc[0]->personFirstName }}"  name="fname">
                          </div>
                          <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide  text-black text-xs font-dark mb-1"
                                   for="grid-city">
                                Middle Name
                            </label>
                            <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white border-blue-500" type="text" value="{{ $acc[0]->personMidleName }}"  name="mname">
                          </div>
                          <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide  text-black text-xs font-dark mb-1"
                                   for="grid-city">
                                Last Name
                            </label>
                            <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white border-blue-500" type="text" value="{{ $acc[0]->personLastName }}"  name="lname">
                          </div>
                      </div>
                    </div>
                    
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full  px-3 mb-6 md:mb-0">
                          <p class="block uppercase tracking-wide bg-red-500  text-white font-bold py-2 px-4 rounded-full font-dark mb-1">
                              Account Settings
                          </p>
                       </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-black text-xs font-dark mb-1"
                              for="grid-state">
                            Account Type
                        </label>
                        <div class="relative">
                          <select class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid rounded transition ease-in-out m-0
                            focus:text-gray-700 focus:bg-white border-blue-600 focus:outline-none" aria-label="Default select example" name="type">
                              @foreach($types as $type)
                                @if( $type['typeId'] == $acc[0]->typeId )
                                <option value="{{$type['typeId']}}" selected="select">{{$type['typeName']}}</option>
                                @else
                                <option value="{{$type['typeId']}}">{{$type['typeName']}}</option>
                                @endif
                              @endforeach
                            </select>
                        </div>
                      </div>

                      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-black text-xs font-hard mb-1"
                              for="grid-state">
                            Account Status
                        </label>
                        <div class="relative">
                          <select class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid  rounded transition ease-in-out m-0
                          focus:text-gray-700 focus:bg-white border-blue-600 focus:outline-none" aria-label="Default select example" name="status">
                          @foreach($status as $sta)
                            @if( $sta['statusId'] == $acc[0]->isActive )
                            <option value="{{ $sta['statusId'] }}" selected="select">{{$sta['status']}}</option>
                            @else
                            <option value="{{ $sta['statusId'] }}">{{ $sta['status'] }}</option>
                            @endif
                          @endforeach
                          </select>
                        </div>
                    </div>
                  </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full md:w-1/8 px-3 mb-6 md:mb-0">
                        <button class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 border border-blue-800 rounded">
                          Submit
                        </button>  
                       </div>
                    </div>


                  </form>
              </div>
          </div>
      </div>
      <!--/Grid Form-->
      </div>
    
    </div>
 </div>


     {{-- <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-3xl">
      <div class="p-3">
        <div class="flex flex-row-reverse p-3">
          <h2 class=" text-red-500 font-semibold"> <a href="{{URL('account')}}"> Modify Account Form </a> </h2>
        </div>
      </div>
    <div class="flex justify-center items-center h-screen">
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md">
            <div class="p-5">
                <form action="{{  url('modify-acc/'.$acc[0]->accId.'/'.$acc[0]->personId)  }}" method="POST">
                  @csrf
                  @method('PUT')
                        <div class="grid grid-flow-row-dense grid-cols-4 grid-rows-4 items-center place-content-center space-y-5">
                          <div class="col-span-4">
                            @if(session('message'))
                              <h1 class="text-green-600">{{session('message')}}</h1>
                            @endif
                            @if($errors->any())
                            @foreach($errors->all() as $err)
                              <span>**{{$err}}**  </span>
                            @endforeach
                          @endif      
                        </div>
                        <div class="col-span-4"><span>Account Info</span></div>
                        <div class="col-span-2">
                          <p> Username: </p>
                        </div> 
                        <div class="col-span-2">
                            <input class="border-2 border-blue-500" type="text" value="{{ $acc[0]->accUserName }}" name="username">
                        </div>      
                        <div class="col-span-2">
                          <p>  Password: </p>
                        </div> 
                        <div class="col-span-2">
                            <input class="border-2 border-blue-500" type="text" value="{{ $acc[0]->accPassWord }}" name="password">
                        </div>      
                        <div class="col-span-4"><span>Personal Info</span></div>
                        <div class="col-span-2">
                          <p>First name: </p>
                        </div> 
                        <div class="col-span-2">
                            <input class="border-2 border-blue-500" type="text" value="{{ $acc[0]->personFirstName }}"  name="fname">
                        </div>      
                        <div class="col-span-2">
                          <p> Middle name: </p>
                        </div> 
                        <div class="col-span-2">
                            <input class="border-2 border-blue-500" type="text" value="{{ $acc[0]->personMidleName }}"  name="mname">
                        </div>      
                        <div class="col-span-2">
                          <p> Last name: </p>
                        </div> 
                        <div class="col-span-2">
                            <input class="border-2 border-blue-500" type="text" value="{{ $acc[0]->personLastName }}"  name="lname">
                        </div>
                        <div class="col-span-4"><span>Account Type</span></div>
                        <div class="col-span-2">
                          <p> Account Type: </p>
                        </div> 
                        <div class="col-span-2">
                            <select class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="type">
                            @foreach($types as $type)
                              @if( $type['typeId'] == $acc[0]->typeId )
                              <option value="{{$type['typeId']}}" selected="select">{{$type['typeName']}}</option>
                              @else
                              <option value="{{$type['typeId']}}">{{$type['typeName']}}</option>
                              @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                          <p> Account Status: </p>
                        </div> 
                        <div class="col-span-2">
                            <select class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="status">
                            @foreach($status as $sta)
                              @if( $sta['statusId'] == $acc[0]->isActive )
                              <option value="{{ $sta['statusId'] }}" selected="select">{{$sta['status']}}</option>
                              @else
                              <option value="{{ $sta['statusId'] }}">{{ $sta['status'] }}</option>
                              @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="col-span-4">
                          <button type="submit" class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
                        </div>
                       
            </form>
          </div>
    </div> --}}
</body>
@endsection