@extends('layouts.app')
@section('container')
<body>
        
        @if(session('type') == 'admin')
            <p>
                {{session('type')}}
            </p>
        @else
            <p>
                {{session('type')}}
            </p>
        @endif
		<div class="flex flex-row">
			<div class="flex flex-col bg-gray-200 h-screen justify-between w-80">
				<div class="flex item-center justify-between text-black-600 text-2xl leading-10 py-4 px-2">
					<b>Yamaha PH</b>
				</div>

				<div class="flex flex-col flex-auto">
					<div class="p-2 hover:bg-red-800">
						<div class="flex flex-row space-x-3">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
							  <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
							  <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
							</svg>

						<h4 class="font-bold text-black-300 text-xl">
							<a href="{{URL('admin.Order-List')}}">
								Order
							</a>
						</h4>

						</div>
					</div>
					<div class="p-2 hover:bg-red-800">
						<div class="flex flex-row space-x-3">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
							  <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
							  <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
							</svg>

						<h4 class="font-bold text-black-300 text-xl">
							<a href="{{URL('inventory')}}">
								Inventory
							</a>
						</h4>

						</div>
					</div>

					<div class="p-2 hover:bg-red-800">
						<div class="flex flex-row space-x-3">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
							  <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd" />
							</svg>

						<h4 class="font-bold text-black-300 text-xl">
							Data Reports
						</h4>

						</div>
					</div>
				</div>

				<div class="flex flex-col">
					<a href="/logOut" class="w-60"><button class="rounded-full text-black text-lg hover:bg-red-800"><b>Logout</b></button>
</a>
				</div>
			</div>
			<div class="flex flex-col">
				<b class="text-2xl ml-2">Dashboard</b>
				<div class="flex flex-row">
					<button class="py-2 text-black-300 ml-20 mt-8 rounded-none border-red-600">Add new</button>
				</div>
			</div>
		</div>
</body>
@endsection