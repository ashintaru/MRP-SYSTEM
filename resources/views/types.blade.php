@extends('layouts.app')
@section('container')
  <body>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
 
     <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-3xl">
      <div class="p-8">
        <div class="flex flex-row-reverse p-3">
          <h2 class=" text-red-500 font-semibold"> <a href={{ URL("/account")}}> Type Management </a> </h2>
        </div>
      </div>
      <div class="md:flex">
        <div class="p-8">
          <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Account Types List</div>
          <table class="table-auto">
            <thead class="border-separate border-spacing-9 border border-slate-500">
              <tr>
                <th>Type Id</th>
                <th>Type Name</th>
                <th>Date Created</th>
                <th>Date Updated</th>
                <th>Action</th>
              </tr>
            </thead>          
            <tbody>
              @foreach($types as $type)
                <tr>
                  <td>{{$type['typeId']}}</td>
                  <td>{{$type['typeName']}}</td>
                  <td>{{$type['typeCreated']}}</td>
                  <td>{{$type['typeUpdated']}}</td>
                  {{-- <td><button><a href="{{ route('modify-type', ['key1' => $type['typeId']] )}}" >Modify </a></button></td> --}}
                </tr>
              @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>
    </body>
@endsection