@extends('layouts.app')
@section('container')
<body>
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">

            <div class="container my-12 mx-auto px-4 md:px-6">
                <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                    <div class="flex flex-row-reverse md:w-1/1 mx-1">

                        <div class="flex mb-2 p-1 md:w-1/8 mx-1 space-x-10">
                            <div class="flex flex-col place-items-center">
                                <a href="#"  id="dropdownToggleButton" data-dropdown-toggle="dropdownToggle" class="notification bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white">
                                    <span><i class="fa fa-bell"> </i> Pending Orders</span>
                                    @if($c!=null)
                                    <span id="badge" class="badge">{{$c}}</span>
                                    @else
                                    <span id="badge"></span>
                                    @endif
                                </a>        
                            </div>
                            <a href="#"  id="dropdownToggleButton" data-dropdown-toggle="dropdownToggle1" class="notification bg-teal-900 cursor-pointer rounded p-1 mx-1 text-white">
                                <span><i class="fa fa-warning"> </i> Empty Material</span>
                                @if($n!=null)
                                <span id="badge" class="badge">{{$n}}</span>
                                @else
                                <span id="badge"></span>
                                @endif
                            </a>        

                            <div id="dropdownToggle" class="hidden z-10 w-102 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="overflow-y-hidden h-40 hover:overflow-y-scroll p-3 py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                    @if($order!=null)
                                            @foreach($order as $o)
                                                <li>
                                                    <span href="#" class="no-underline  text-2xl">
                                                        <i class="fa fa-warning"></i> The {{$o['materialCode']}}
                                                    </span>
                                                    <span class="no-underline text-lg">
                                                        were be delivered at <span class="text-blue-900 bold"> {{$o['orderDate']}} </span> 
                                                        check it on <a class="underline" href="{{ URL('showOrderList', ['key1' => $o['orderListId'] ] )}}"> {{$o['orderListTitle']}} </a>
                                                    </span>
                                                </li>    
                                            @endforeach
                                        @else
                                            <li>
                                                <span href="#" class="no-underline  text-lg">
                                                    <i class="fa fa-warning"></i> No Pending Orders to see in this week
                                                </span>
                                            </li>
                                        @endif
                                </ul>
                            </div>

                            <div id="dropdownToggle1" class="hidden z-10 w-102 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="overflow-y-hidden h-40 hover:overflow-y-scroll p-3 py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                    @if($null!=null)
                                            @foreach($null as $o)
                                                <li>
                                                    <span href="#" class="no-underline  text-2xl">
                                                        <i class="fa fa-warning"></i> The {{$o['materialCode']}}
                                                    </span>
                                                    <span class="no-underline text-lg">
                                                        Have been <span class="text-blue-900 bold"> {{$o['currentQtty']}} Lately</span> 
                                                        check it on <a class="underline" href="{{ URL('inventory')}}"> Inventory </a>
                                                    </span>
                                                </li>    
                                            @endforeach
                                        @else
                                            <li>
                                                <span href="#" class="no-underline  text-lg">
                                                    <i class="fa fa-warning"></i> All materials are not empty
                                                </span>
                                            </li>
                                        @endif
                                </ul>
                            </div>
                        </div>
                    </div>
              </div>

                <div class="container my-12 mx-auto px-2 md:px-2">
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                        <div class=" mb-2 p-2 md:w-1/2 mx-2">
                          <canvas id="myChart1"></canvas>
                        </div>
                        <div class=" mb-2 p-2 md:w-1/2 mx-2">
                          <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">      
                              <div class=" mb-2 p-2 md:w-1/4 mx-2">
                                  <table class="min-w-full">
                                      <div class="place-items-center">
                                          <span> Empty Materials</span>
                                      </div>
                                      <thead class="border-b">
                                          <tr>
                                              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                                                  Material name
                                              </th>
                                              <th scope="col" class="text-sm font-large text-gray-900 px-6 py-4 text-left">
                                                  Material Quantity
                                              </th>
                                          </tr>                                    
                                      </thead>
                                      <tbody>
                                          @if($null!=null)
                                              @foreach($null as $l)
                                                  <tr>
                                                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$l['materialCode']}}</td>
                                                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$l['currentQtty']}}</td>
                                                  </tr>
                                              @endforeach
                                          @endif
                                      </tbody>
                                  </table>
                              </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</body>
<script>
    $(document).ready(function () {
        const inventory = {!! json_encode($least , JSON_HEX_TAG) !!};
    const labeL1 = [];
    const data1 = [];

      for (const x in inventory) {
        labeL1[labeL1.length] = inventory[x].materialCode;
        data1[data1.length] = inventory[x].currentQtty;      
        }

        const ctx1 = document.getElementById('myChart1').getContext('2d');
        const myChart = new Chart(ctx1, {
          type: 'line',
          data: {
              labels: labeL1,
              datasets: [{
                  label: 'Least 5 Materials',
                  data: data1,
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                  ],
                  borderColor: [
                      'rgba(255, 99, 132, 1)',
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      }); 

    const inventory1 = {!! json_encode($high , JSON_HEX_TAG) !!};
    const labeL2 = [];
    const data2 = [];

      for (const x in inventory1) {
        labeL2[labeL2.length] = inventory1[x].materialCode;
        data2[data2.length] = inventory1[x].currentQtty;      
        }

        const ctx2 = document.getElementById('myChart2').getContext('2d');
        const myChart2 = new Chart(ctx2, {
          type: 'line',
          data: {
              labels: labeL2,
              datasets: [{
                  label: 'Top 5 Materials',
                  data: data2,
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                  ],
                  borderColor: [
                      'rgba(255, 99, 132, 1)',
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      }); 

    });
    

    
</script>
@endsection
